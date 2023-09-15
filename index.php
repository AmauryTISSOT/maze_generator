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

require 'Cell.php';
require 'DimensionalArray.php';

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
