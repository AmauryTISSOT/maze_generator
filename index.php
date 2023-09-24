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

// initialize a new 2D dimensional Array
$grid = new DimensionalArray();

//TODO: move this part to DimensionalArray class
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $cell = new Cell($i, $j);
        $grid->array[$i][$j] = $cell;
    }
}

$grid->generateMaze(1, 1);

$maze = new DisplayMaze($grid->array);
$maze->showCellNumber = true;
$maze->showMaze();

?>
</body>
</html>
