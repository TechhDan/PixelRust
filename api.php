<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use PixelRust\PixelRustAPI;

require_once __DIR__ . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new PixelRustAPI()
        )
    ),
    // 8081 // local
    3000
);

$server->run();
