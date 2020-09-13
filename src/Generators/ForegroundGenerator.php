<?php

namespace PixelRust\Generators;

class ForegroundGenerator extends AbstractTileGenerator
{
    public function getNextTile($oldMap, $row, $column)
    {
        $topLeft = $oldMap[$row - 1][$column - 1] ?? false;
        $top = $oldMap[$row - 1][$column] ?? false;
        $topRight = $oldMap[$row - 1][$column + 1] ?? false;
        $left = $oldMap[$row][$column - 1] ?? false;
        $right = $oldMap[$row][$column + 1] ?? false;
        $bottomLeft = $oldMap[$row + 1][$column - 1] ?? false;
        $bottom = $oldMap[$row + 1][$column] ?? false;
        $bottomRight = $oldMap[$row + 1][$column + 1] ?? false;

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
            $oldMap[$row][$column] === $this->tiles['Background/lightGrass'] ||
            $oldMap[$row][$column] === $this->tiles['Background/darkGrass']
        ) {
            // sandSingle
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
                switch (mt_rand(0, 30)) {
                    case 0:
                    case 5:
                        return $this->tiles['Tree'];
                    case 10:
                        return $this->tiles['TreeFruit'];
                    case 30:
                        return mt_rand(0, 5) == 0 ? $this->tiles['House'] : 0;
                    default:
                        return 0;
                }
            }
        }
        return 0;
    }
}
