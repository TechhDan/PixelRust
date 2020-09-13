<?php

namespace PixelRust\Generators;

class BackgroundDecoration extends AbstractTileGenerator
{
    public function getNextTile($oldMap, $row, $column)
    {
        if (
            $oldMap[$row][$column] === $this->tiles['Background/lightGrass'] ||
            $oldMap[$row][$column] === $this->tiles['Background/darkGrass']
        ) {
            switch (mt_rand(0, 150)) {
                case 0:
                case 5:
                case 10:
                    return $this->tiles['Grass'];
                case 15:
                    return $this->tiles['Flower'];
                case 20:
                    return $this->tiles['Rock'];
                case 25:
                    return $this->tiles['Bush'];
                default:
                    return 0;
            }
        }

        if ($oldMap[$row][$column] === $this->tiles['Background/sand']) {
            switch (mt_rand(0, 30)) {
                case 0:
                case 5:
                    return $this->tiles['Dug'];
                case 15:
                    return $this->tiles['DugCarrot'];
                default:
                    return 0;
            }
        }

        return 0;
    }
}
