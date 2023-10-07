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

    private function removeWall($current, $neighbor)
    {
        //FIXME: don't change wall array correctly
        $wallArrayIndex = $this->findWall($current, $neighbor);
        $this->array[$current[0]][$current[1]]->wall[$wallArrayIndex] = false;
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

    public function findWall($current, $neighbor)
    {
        //top
        if ($neighbor[0] === ($current[0] + 1)) {
            return 0;
        }

        //right
        if ($neighbor[1] === ($current[1] + 1)) {
            return 1;
        }

        //bottom
        if ($neighbor[0] === ($current[0] + 1)) {
            return 2;
        }

        //left
        if ($neighbor[1] === ($current[1] - 1)) {
            return 3;
        }
    }

    // set to private ?
    public function getNeighborCellsCoordinates($x, $y)
    {
        $arr = [
            [$x - 1, $y], // top
            [$x, $y + 1], // right
            [$x + 1, $y], // left
            [$x, $y - 1], // bottom
        ];

        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr[$i]); $j++) {
                // remove the cell coordinate if x or y < 0
                if ($arr[$i][$j] < 0) {
                    unset($arr[$i]);
                    $arr = array_values($arr);
                }
                // remove the cell coordinate if x or y > array length
                if ($arr[$i][$j] > count($this->array) - 1) {
                    unset($arr[$i]);
                    $arr = array_values($arr);
                }

            }
        }

        return $arr;
    }

    public function generateMaze($x, $y)
    {
        // set the current cell to visited
        $this->setVisited($x, $y);

        $neighborCellCoordinates = $this->getNeighborCellsCoordinates($x, $y);

        $unvisitedNeighborCells = [];

        // add coordinates of unvisited neighbor cells
        for ($i = 0; $i < count($neighborCellCoordinates); $i++) {
            if (!$this->array[$neighborCellCoordinates[$i][0]][$neighborCellCoordinates[$i][1]]->visited) {
                $unvisitedNeighborCells[] = $neighborCellCoordinates[$i];
            }
        }

        while (!empty($unvisitedNeighborCells)) {
            // select a random neighbor cell
            $randomNumber = rand(0, count($unvisitedNeighborCells) - 1);
            $randomCellCoordinate = $unvisitedNeighborCells[$randomNumber];
            echo "<script>console.log('" . json_encode($randomCellCoordinate) . "')</script>";

            // for testing
            $this->setVisited($randomCellCoordinate[0], $randomCellCoordinate[1]);

            unset($unvisitedNeighborCells[$randomNumber]);
            $unvisitedNeighborCells = array_values($unvisitedNeighborCells);

            //TODO: remove wall between current cell ($x, $y) and randomCellCoordinate
            $this->removeWall([$x, $y], $randomCellCoordinate);
        }

    }
}
