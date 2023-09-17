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
require 'DisplayMaze.php';

$maze = new DisplayMaze();
$maze->showCellNumber = true;
$maze->generateCell(6, 6);

$grid = new DimensionalArray();

for ($i = 0; $i < 3; $i++) {
    echo "</br>";
    for ($j = 0; $j < 3; $j++) {
        $cell = new Cell($i, $j);
        $grid->array[$i][$j] = $cell;
        $cell->getCoordinate();
    }
}

function getNeighbourCells($x, $y, $objet)
{
    $top = $objet->array[$x - 1][$y];
    $right = $objet->array[$x][$y + 1];
    $bottom = $objet->array[$x + 1][$y];
    $left = $objet->array[$x][$y - 1];

    $top->visited = true;
    $right->visited = true;
    $bottom->visited = true;
    $left->visited = true;
}

$grid->consoleLogArray();

$grid->setVisited(0, 0);

$grid->checkIfVisited(0, 0);

getNeighbourCells(1, 1, $grid);

$grid->consoleLogArray();

?>
</body>
</html>
