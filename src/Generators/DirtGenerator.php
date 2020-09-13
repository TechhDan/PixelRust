<?php

namespace PixelRust\Generators;

class DirtGenerator extends AbstractTileGenerator
{
    public function getNextTile(&$oldMap, $row, $column)
    {
        $topLeft = $oldMap[$row - 1][$column - 1] ?? false;
        $top = $oldMap[$row - 1][$column] ?? false;
        $topRight = $oldMap[$row - 1][$column + 1] ?? false;
        $left = $oldMap[$row][$column - 1] ?? false;
        $right = $oldMap[$row][$column + 1] ?? false;
        $bottomLeft = $oldMap[$row + 1][$column - 1] ?? false;
        $bottom = $oldMap[$row + 1][$column] ?? false;
        $bottomRight = $oldMap[$row + 1][$column + 1] ?? false;

        $topLeft2 = $oldMap[$row - 2][$column - 2] ?? false;
        $top2 = $oldMap[$row - 2][$column] ?? false;
        $topRight2 = $oldMap[$row - 2][$column + 2] ?? false;
        $left2 = $oldMap[$row][$column - 2] ?? false;
        $right2 = $oldMap[$row][$column + 2] ?? false;
        $bottomLeft2 = $oldMap[$row + 2][$column - 2] ?? false;
        $bottom2 = $oldMap[$row + 2][$column] ?? false;
        $bottomRight2 = $oldMap[$row + 2][$column + 2] ?? false;

        $topLeft3 = $oldMap[$row - 3][$column - 3] ?? false;
        $top3 = $oldMap[$row - 3][$column] ?? false;
        $topRight3 = $oldMap[$row - 3][$column + 3] ?? false;
        $left3 = $oldMap[$row][$column - 3] ?? false;
        $right3 = $oldMap[$row][$column + 3] ?? false;
        $bottomLeft3 = $oldMap[$row + 3][$column - 3] ?? false;
        $bottom3 = $oldMap[$row + 3][$column] ?? false;
        $bottomRight3 = $oldMap[$row + 3][$column + 3] ?? false;

        $topLeft4 = $oldMap[$row - 4][$column - 4] ?? false;
        $top4 = $oldMap[$row - 4][$column] ?? false;
        $topRight4 = $oldMap[$row - 4][$column + 4] ?? false;
        $left4 = $oldMap[$row][$column - 4] ?? false;
        $right4 = $oldMap[$row][$column + 4] ?? false;
        $bottomLeft4 = $oldMap[$row + 4][$column - 4] ?? false;
        $bottom4 = $oldMap[$row + 4][$column] ?? false;
        $bottomRight4 = $oldMap[$row + 4][$column + 4] ?? false;

        if ($oldMap[$row][$column]) {
            // sand
            if (
                ($topLeft == $this->tiles['Background/darkGrass'] || $topLeft == $this->tiles['Background/lightGrass']) &&
                ($top == $this->tiles['Background/darkGrass'] || $top == $this->tiles['Background/lightGrass']) &&
                ($topRight == $this->tiles['Background/darkGrass'] || $topRight == $this->tiles['Background/lightGrass']) &&
                ($left == $this->tiles['Background/darkGrass'] || $left == $this->tiles['Background/lightGrass']) &&
                ($right == $this->tiles['Background/darkGrass'] || $right == $this->tiles['Background/lightGrass']) &&
                ($bottomLeft == $this->tiles['Background/darkGrass'] || $bottomLeft == $this->tiles['Background/lightGrass']) &&
                ($bottom == $this->tiles['Background/darkGrass'] || $bottom == $this->tiles['Background/lightGrass']) &&
                ($bottomRight == $this->tiles['Background/darkGrass'] || $bottomRight == $this->tiles['Background/lightGrass'])
                    &&
                ($topLeft2 == $this->tiles['Background/darkGrass'] || $topLeft2 == $this->tiles['Background/lightGrass']) &&
                ($top2 == $this->tiles['Background/darkGrass'] || $top2 == $this->tiles['Background/lightGrass']) &&
                ($topRight2 == $this->tiles['Background/darkGrass'] || $topRight2 == $this->tiles['Background/lightGrass']) &&
                ($left2 == $this->tiles['Background/darkGrass'] || $left2 == $this->tiles['Background/lightGrass']) &&
                ($right2 == $this->tiles['Background/darkGrass'] || $right2 == $this->tiles['Background/lightGrass']) &&
                ($bottomLeft2 == $this->tiles['Background/darkGrass'] || $bottomLeft2 == $this->tiles['Background/lightGrass']) &&
                ($bottom2 == $this->tiles['Background/darkGrass'] || $bottom2 == $this->tiles['Background/lightGrass']) &&
                ($bottomRight2 == $this->tiles['Background/darkGrass'] || $bottomRight2 == $this->tiles['Background/lightGrass'])
                    &&
                ($topLeft3 == $this->tiles['Background/darkGrass'] || $topLeft3 == $this->tiles['Background/lightGrass']) &&
                ($top3 == $this->tiles['Background/darkGrass'] || $top3 == $this->tiles['Background/lightGrass']) &&
                ($topRight3 == $this->tiles['Background/darkGrass'] || $topRight3 == $this->tiles['Background/lightGrass']) &&
                ($left3 == $this->tiles['Background/darkGrass'] || $left3 == $this->tiles['Background/lightGrass']) &&
                ($right3 == $this->tiles['Background/darkGrass'] || $right3 == $this->tiles['Background/lightGrass']) &&
                ($bottomLeft3 == $this->tiles['Background/darkGrass'] || $bottomLeft3 == $this->tiles['Background/lightGrass']) &&
                ($bottom3 == $this->tiles['Background/darkGrass'] || $bottom3 == $this->tiles['Background/lightGrass']) &&
                ($bottomRight3 == $this->tiles['Background/darkGrass'] || $bottomRight3 == $this->tiles['Background/lightGrass'])
                /*    &&
                ($topLeft4 == $this->tiles['Background/darkGrass'] || $topLeft4 == $this->tiles['Background/lightGrass']) &&
                ($top4 == $this->tiles['Background/darkGrass'] || $top4 == $this->tiles['Background/lightGrass']) &&
                ($topRight4 == $this->tiles['Background/darkGrass'] || $topRight4 == $this->tiles['Background/lightGrass']) &&
                ($left4 == $this->tiles['Background/darkGrass'] || $left4 == $this->tiles['Background/lightGrass']) &&
                ($right4 == $this->tiles['Background/darkGrass'] || $right4 == $this->tiles['Background/lightGrass']) &&
                ($bottomLeft4 == $this->tiles['Background/darkGrass'] || $bottomLeft4 == $this->tiles['Background/lightGrass']) &&
                ($bottom4 == $this->tiles['Background/darkGrass'] || $bottom4 == $this->tiles['Background/lightGrass']) &&
                ($bottomRight4 == $this->tiles['Background/darkGrass'] || $bottomRight4 == $this->tiles['Background/lightGrass'])*/
            ) {
                return $this->tiles['Background/sand'];
            }
            return $oldMap[$row][$column];
        }
    }
}
