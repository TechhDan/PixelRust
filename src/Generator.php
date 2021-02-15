<?php

namespace PixelRust;

use PixelRust\Generators\PerlinNoise;
use PixelRust\Generators\BackgroundCellularAutomaton;
use PixelRust\Generators\DirtGenerator;
use PixelRust\Generators\DirtFixerGenerator;
use PixelRust\Generators\ForegroundGenerator;
use PixelRust\Generators\BackgroundDecoration;

class Generator
{
    protected $rows;
    protected $columns;
    protected $tileSize;
    protected $sprites;
    protected $background;
    protected $backgroundDecoration;
    protected $foreground;

    public function __construct(int $rows, int $columns, int $tileSize)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->tileSize = $tileSize;
        $this->setSprites();
        $this->generate();
    }

    private function setSprites()
    {
        $string = file_get_contents(__DIR__ . '/../assets/SpriteSheet.json');
        $spritesheet = json_decode($string, true);
        $sprites = [];
        $sprites[] = null;
        foreach ($spritesheet['frames'] as $frame) {
            $sprites[] = [
                'name' => str_replace('.png', '', $frame['filename']),
                'x' => $frame['frame']['x'],
                'y' => $frame['frame']['y'],
                'w' => $frame['frame']['w'],
                'h' => $frame['frame']['h']
            ];
        }
        $this->sprites = $sprites;
    }

    private function generate()
    {
        $perlinNoise = new PerlinNoise(mt_rand(), [8, 8, 8, 8]);

        $this->tiles = $this->getTiles();

        $map = $perlinNoise->generate($this->rows, $this->columns);

        $map = (new BackgroundCellularAutomaton($this->rows, $this->columns, $this->tiles))
            ->generate($map);

        $map = (new DirtGenerator($this->rows, $this->columns, $this->tiles))
            ->generate($this->convertLinearArrayToGridArray($map));

        $map = (new DirtFixerGenerator($this->rows, $this->columns, $this->tiles))
            ->generate($this->convertLinearArrayToGridArray($map));

        $this->backgroundDecoration = (new BackgroundDecoration($this->rows, $this->columns, $this->tiles))
            ->generate($this->convertLinearArrayToGridArray($map));

        $this->foreground = (new ForegroundGenerator($this->rows, $this->columns, $this->tiles))
            ->generate($this->convertLinearArrayToGridArray($map));
        $this->background = $map;
    }

    private function convertLinearArrayToGridArray($linearArray)
    {
        $squareRoot = sqrt(count($linearArray));
        $result = [];
        $counter = 0;
        for ($x = 0; $x < $squareRoot; $x++) {
            for ($y = 0; $y < $squareRoot; $y++) {
                $result[$x][$y] = $linearArray[$counter];
                $counter++;
            }
        }
        return $result;
    }

    private function getTiles()
    {
        $tiles = [];
        foreach ($this->sprites as $index => $sprite) {
            if (isset($sprite['name'])) {
                $tiles[$sprite['name']] = $index;
            }
        }
        return $tiles;
    }

    public function getSprites(): array
    {
        return $this->sprites;
    }

    public function getBackground(): array
    {
        return $this->background;
    }

    public function getBackgroundDecoration(): array
    {
        return $this->backgroundDecoration;
    }

    public function getForeground(): array
    {
        return $this->foreground;
    }

    public function generateSpawnPoint()
    {
        $map = $this->convertLinearArrayToGridArray($this->background);
        $x = null;
        $y = null;
        while (!$x && !$y) {

            $row = mt_rand($this->rows/2 - 10, $this->rows/2 + 10);
            $column = mt_rand($this->columns/2 - 10, $this->columns/2 + 10);

            // Check if set
            $topLeft = $map[$row - 1][$column - 1] ?? false;
            $top = $map[$row - 1][$column] ?? false;
            $topRight = $map[$row - 1][$column + 1] ?? false;

            $left = $map[$row][$column - 1] ?? false;
            $right = $map[$row][$column + 1] ?? false;

            $bottomLeft = $map[$row + 1][$column - 1] ?? false;
            $bottom = $map[$row + 1][$column] ?? false;
            $bottomRight = $map[$row + 1][$column + 1] ?? false;

            $topLeft = 
                ($topLeft === $this->tiles['Background/lightGrass'] ||
                $topLeft === $this->tiles['Background/darkGrass']) ? true : false;
            $top = 
                ($top === $this->tiles['Background/lightGrass'] ||
                $top === $this->tiles['Background/darkGrass']) ? true : false;
            $topRight = 
                ($topRight === $this->tiles['Background/lightGrass'] ||
                $topRight === $this->tiles['Background/darkGrass']) ? true : false;
            $left = 
                ($left === $this->tiles['Background/lightGrass'] ||
                $left === $this->tiles['Background/darkGrass']) ? true : false;
            $right = 
                ($right === $this->tiles['Background/lightGrass'] ||
                $right === $this->tiles['Background/darkGrass']) ? true : false;
            $bottomLeft = 
                ($bottomLeft === $this->tiles['Background/lightGrass'] ||
                $bottomLeft === $this->tiles['Background/darkGrass']) ? true : false;
            $bottom = 
                ($bottom === $this->tiles['Background/lightGrass'] ||
                $bottom === $this->tiles['Background/darkGrass']) ? true : false;
            $bottomRight =
                ($bottomRight === $this->tiles['Background/lightGrass'] ||
                $bottomRight === $this->tiles['Background/darkGrass']) ? true : false;

            if (
                $map[$row][$column] === $this->tiles['Background/lightGrass'] ||
                $map[$row][$column] === $this->tiles['Background/darkGrass']
            ) {
                if (
                    ($topLeft &&
                    $top &&
                    $topRight &&
                    $left &&
                    $right &&
                    $bottomLeft &&
                    $bottom &&
                    $bottomRight)
                ) {
                    $x = $column * $this->tileSize;
                    $y = $row * $this->tileSize;
                }
            }
        }

        return [
            'x' => $x,
            'y' => $y,
        ];
    }
}
