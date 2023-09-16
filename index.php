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
require 'DisplayCell.php';

$cell = new DisplayCell();
$cell->generateCell(6, 6);

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
