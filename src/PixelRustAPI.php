<?php

namespace PixelRust;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PixelRust\Generators\PerlinNoise;
use PixelRust\Player;

class PixelRustAPI implements MessageComponentInterface
{
    protected $generator;
    protected $clients;
    protected $rows = 100;
    protected $columns = 100;
    protected $tileSize = 32;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->generator = new Generator($this->rows, $this->columns, $this->tileSize);
        echo "Started server\n";
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $spawn = $this->generator->generateSpawnPoint();
        $conn->player = new Player(
            (int) $spawn['x'],
            (int) $spawn['y']
        );
        $players = [];
        foreach ($this->clients as $client) {
            $players[] = [
                'id' => $client->resourceId,
                'x' => $client->player->getX(),
                'y' => $client->player->getY(),
            ];
        }
        $conn->send(json_encode([
            'action' => 'initialUpdate',
            'id' => $conn->resourceId,
            'rows' => $this->rows,
            'columns' => $this->columns,
            'tileSize' => $this->tileSize,
            'map' => [
                'background' => $this->generator->getBackground(),
                'backgroundDecoration' => $this->generator->getBackgroundDecoration(),
                'foreground' => $this->generator->getForeground(),
                'sprites' => $this->generator->getSprites()
            ],
            'player' => [
                'x' => $conn->player->getX(),
                'y' => $conn->player->getY(),
            ],
            'players' => $players
        ]));
        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'action' => 'registerPlayer',
                'id' => $conn->resourceId,
                'x' => $conn->player->getX(),
                'y' => $conn->player->getY()
            ]));
        }
        $this->clients->attach($conn);
        echo "New Connection! {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $msgArray = json_decode($msg, true);
        $results = [];
        foreach ($this->clients as $client) {
            if ($client->resourceId == $from->resourceId) {
                $client->player->update($msgArray);
            }
            $results[] = [
                'id' => $client->resourceId,
                'x' => $client->player->getX(),
                'y' => $client->player->getY(),
                'up' => (bool) $client->player->getUp(),
                'down' => (bool) $client->player->getDown(),
                'right' => (bool) $client->player->getRight(),
                'left' => (bool) $client->player->getLeft(),
                'attack' => (bool) $client->player->getAttack()
            ];
        }
        $results = [
            'action' => 'update',
            'states' => $results
        ];
        $results = json_encode($results);
        foreach ($this->clients as $client) {
            $client->send($results);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'action' => 'playerDisconnected',
                'id' => $conn->resourceId
            ]));
        }
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
