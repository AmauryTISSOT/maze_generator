<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Maze Generator</title>
</head>
<body>
<?php
function generateAssociativeArray(int $numberOfKeys)
{
    $array = [];
    $wallArray = ["Top", "Bottom", "Left", "Right"];
    for ($i = 0; $i <= $numberOfKeys; $i++) {
        $array[$i] = $wallArray;
    }
    return $array;
}

function generateCell(int $numbHorizontalCell, int $numbVerticalCell)
{
    echo "This is a $numbHorizontalCell by $numbVerticalCell maze";

    $totalCell = $numbHorizontalCell * $numbVerticalCell;
    $gridWidth = $numbHorizontalCell * 50;
    $gridHeight = $numbVerticalCell * 50;

    echo "<div class='grid-container' style='grid-template-columns: repeat($numbHorizontalCell, 1fr); grid-template-rows: repeat($numbVerticalCell, 1fr); width: {$gridWidth}px; height: {$gridHeight}px;'>";
    for ($i = 0; $i < $totalCell; $i++) {
        echo "<div class='maze-cell'>$i</div>";
    }
    echo "</div>";

    $wall = generateAssociativeArray($totalCell);

}

generateCell(6, 6);

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
}

$grid = new DimensionalArray();
for ($i = 0; $i < 3; $i++) {
    echo "</br>";
    for ($j = 0; $j < 3; $j++) {
        $cell = new Cell($i, $j);
        $grid->array[$i][$j] = $cell;
        $cell->getCordinate();

    }
}

$grid->consoleLogArray();

$grid->array[0][0]->visited = true;

function checkIfVisited($arr, $x, $y)
{

    if ($arr->array[$y][$x]->visited) {
        echo "</br>($x,$y) has been visited";
        return true;
    } else {
        echo "</br>($x,$y) not visited";
        return false;
    }
}

//echo $grid->array[0][0]->visited;

checkIfVisited($grid, 1, 0);

$grid->consoleLogArray();

?>
</body>
</html>
