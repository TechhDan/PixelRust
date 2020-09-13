<?php

namespace PixelRust\Generators;

abstract class AbstractTileGenerator
{
    protected $rows;
    protected $columns;
    protected $tiles;

    public function __construct($rows, $columns, $tiles)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->tiles = $tiles;
    }

    public function generate($oldMap)
    {
        $newMap = [];
        for ($x = 0; $x < $this->columns; $x++) { 
            for ($y = 0; $y < $this->rows; $y++) {
                $newMap[] = $this->getNextTile($oldMap, $x, $y);
            }
        }
        return $newMap;
    }
}
