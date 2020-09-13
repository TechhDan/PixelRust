<?php

namespace PixelRust\Generators;

class BackgroundCellularAutomaton extends AbstractTileGenerator
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

        if ($oldMap[$row][$column]) {
            // singleLandTile
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/singleLandTile'];
            }
            // leftCliff
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/leftCliff'];
            }
            // rightCliff
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/rightCliff'];
            }
            // topWaterCliff
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                ) {
                return $this->tiles['Background/topWaterCliff'];
            }
            // Full Cliff
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/fullCliff'];
            }
            // leftWaterCliff
            if (
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/leftWaterCliff'];
            }
            // rightWaterCliff
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/rightWaterCliff'];
            }
            // cornerTopLeftWaterCliff
            if (
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/cornerTopLeftWaterCliff'];
            }
            // cornerTopRightWaterCliff
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/cornerTopRightWaterCliff'];
            }
            // rightClosingWater
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/rightClosingWater'];
            }
            // leftClosingWater
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/leftClosingWater'];
            }
            // singleTop
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/singleTop'];
            }
            // grassVerticalBorders
            if (
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/grassVerticalBorders'];
            }
            // grassHorizontalBorders
            if (
                ($topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/grassHorizontalBorders'];
            }
            // oceanNextToRightCliff
            if (
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/oceanNextToRightCliff'];
            }
            // oceanOnRightCornerLeft
            if (
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/oceanOnRightCornerLeft'];
            }
            // cliffOnLeftOceanBottom
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/cliffOnLeftOceanBottom'];
            }
            // oceanTopAndBottomLeftCorner
            if (
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/oceanTopAndBottomLeftCorner'];
            }
            // rightAngleCornerOceanTopRight
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/rightAngleCornerOceanTopRight'];
            }
            // oceanTopRightAngleOceanBottom
            if (
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/oceanTopRightAngleOceanBottom'];
            }
            // oceanTopAndBottom
            if (
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/oceanTopAndBottom'];
            }
            // rightAngleTopLeftAndCliffOnRightOceanBottom
            if (
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/rightAngleTopLeftAndCliffOnRightOceanBottom'];
            }
            // hangingCliffRight
            if (
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/hangingCliffRight'];
            }
            // oceanNextToLeftCliff
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/oceanNextToLeftCliff'];
            }
            // hangingCliffLeft
            if (
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/hangingCliffLeft'];
            }
            // oceanOnLeftCornerRight
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/oceanOnLeftCornerRight'];
            }
            // oceanLeftAndRight
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/oceanLeftAndRight'];
            }
            // hangingCliffBottom
            if (
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/hangingCliffBottom'];
            }
            return mt_rand(0, 1) === 0 ? $this->tiles['Background/lightGrass'] : $this->tiles['Background/darkGrass'];
        }

        switch (mt_rand(0, 3)) {
            case 0:
            case 1:
                return $this->tiles['Background/water'];
            case 2:
                return $this->tiles['Background/deepWater'];
            case 3:
                return $this->tiles['Background/deepWater2'];
        }
    }
}
