<?php
class Cell
{
    public $x;
    public $y;
    public $wall = [true, true, true, true];
    public $visited = false;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getCordinate()
    {
        echo "($this->x, $this->y) ";

    }

}
