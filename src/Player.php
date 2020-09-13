<?php

namespace PixelRust;

class Player
{
    protected $up;
    protected $down;
    protected $left;
    protected $right;
    protected $attack;
    protected $x;
    protected $y;
    protected $speed = 80;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->down = false;
        $this->left = false;
        $this->up = false;
        $this->right = false;
        $this->attack = false;
    }

    public function update(array $input)
    {
        $dirx = 0;
        $diry = 0;

        $this->up = (bool) $input['up'];
        $this->down = (bool) $input['down'];
        $this->left = (bool) $input['left'];
        $this->right = (bool) $input['right'];
        $this->attack = (bool) $input['attack'];

        if ($input['left']) { $dirx = -1; }
        if ($input['right']) { $dirx = 1; }
        if ($input['up']) { $diry = -1; }
        if ($input['down']) { $diry = 1; }

        if (!$this->attack) {
            $this->x += $dirx * $this->speed * (float) $input['delta'];
            $this->y += $diry * $this->speed * (float) $input['delta'];
        }
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getDown()
    {
        return (bool) $this->down;
    }

    public function getLeft()
    {
        return (bool) $this->left;
    }

    public function getUp()
    {
        return (bool) $this->up;
    }

    public function getRight()
    {
        return (bool) $this->right;
    }

    public function getAttack()
    {
        return (bool) $this->attack;
    }
}
