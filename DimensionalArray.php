<?php
class DimensionalArray
{
    public $array = [];
    public $rows = 3;
    public $columns = 3;
    public $numberOfCell;

    public function __construct()
    {
        $this->numberOfCell = $this->rows * $this->columns;
    }

    public function setRows($i)
    {
        $this->rows = $i;
    }

    public function setColumns($i)
    {
        $this->columns = $i;
    }

    public function getArray()
    {
        return $this->array;
    }

    public function consoleLogArray()
    {
        echo "<script>console.log('" . json_encode($this->array) . "')</script>";
    }

    public function create2DArray($object)
    {
        for ($i = 0; $i < $this->rows; $i++) {
            $this->array[$i] = [];
            for ($j = 0; $j < $this->columns; $j++) {
                $this->array[$i][$j] = $object;
            }
        }
    }

    public function setVisited($x, $y)
    {
        $this->array[$x][$y]->visited = true;
    }

    public function checkIfVisited($x, $y)
    {
        if ($this->array[$y][$x]->visited) {
            echo "</br> </br>($x,$y) has been visited";

            return true;
        } else {
            echo "</br>($x,$y) not visited";
            return false;
        }
    }
}
