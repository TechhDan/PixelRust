<?php

namespace PixelRust\Generators;

class DirtFixerGenerator extends AbstractTileGenerator
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

        $topLeft = $topLeft === $this->tiles['Background/sand'] ? true : false;
        $top = $top === $this->tiles['Background/sand'] ? true : false;
        $topRight = $topRight === $this->tiles['Background/sand'] ? true : false;
        $left = $left === $this->tiles['Background/sand'] ? true : false;
        $right = $right === $this->tiles['Background/sand'] ? true : false;
        $bottomLeft = $bottomLeft === $this->tiles['Background/sand'] ? true : false;
        $bottom = $bottom === $this->tiles['Background/sand'] ? true : false;
        $bottomRight = $bottomRight === $this->tiles['Background/sand'] ? true : false;

        if ($oldMap[$row][$column] === $this->tiles['Background/sand']) {
            // sandSingleTop
            if (
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
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
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
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/sandSingleTop'];
            }
            // sandVerticalBorders
            if (
                (!$topLeft &&
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
                $topRight &&
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
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
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
                ($topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
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
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/sandVerticalBorders'];
            }
            // sandSingleBottom
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
                $topRight &&
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
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
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
                $bottomRight)
            ) {
                return $this->tiles['Background/sandSingleBottom'];
            }
            // sandSingleLeft
            if (
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
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
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
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
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
                $topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandSingleLeft'];
            }
            // sandSingleRight
            if (
                (!$topLeft &&
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
                !$right &&
                $bottomLeft &&
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
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
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
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/sandSingleRight'];
            }
            // sandHorizontalBorders
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
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
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
                !$topRight &&
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
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
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
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandHorizontalBorders'];
            }
            // sandRightBorder
            if (
                ($topLeft &&
                $top &&
                !$topRight &&
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
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
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
                (!$topLeft &&
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
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
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
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandRightBorder'];
            }
            // sandLeftBorder
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
                !$topRight &&
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
                !$bottomLeft &&
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
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
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
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandLeftBorder'];
            }
            // sandTopLeftCorner
            if (
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
                !$topRight &&
                !$left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
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
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
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
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandTopLeftCorner'];
            }
            // sandTopRightCorner
            if (
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
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandTopRightCorner'];
            }
            // sandBottomLeftCorner
            if (
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
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
                !$left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
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
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
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
                return $this->tiles['Background/sandBottomLeftCorner'];
            }
            // sandTopBorder
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
                ($topLeft &&
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
                (!$topLeft &&
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
                !$topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
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
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                $left &&
                $right &&
                $bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                $bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandTopBorder'];
            }
            // sandBottomBorder
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
                (!$topLeft &&
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
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                ($topLeft &&
                $top &&
                !$topRight &&
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
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
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
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                $right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
            ) {
                return $this->tiles['Background/sandBottomBorder'];
            }
            // sandBottomRightCorner
            if (
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
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                !$topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
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
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                $top &&
                $topRight &&
                $left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandBottomRightCorner'];
            }
            // sandSingle
            if (
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
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
                $bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                !$bottomRight)
                    ||
                ($topLeft &&
                !$top &&
                !$topRight &&
                !$left &&
                !$right &&
                !$bottomLeft &&
                !$bottom &&
                $bottomRight)
                    ||
                (!$topLeft &&
                !$top &&
                $topRight &&
                !$left &&
                !$right &&
                $bottomLeft &&
                !$bottom &&
                !$bottomRight)
            ) {
                return $this->tiles['Background/sandSingle'];
            }
        }
        return $oldMap[$row][$column];
    }
}
