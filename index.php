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
function generateCell(int $numbHorizontalCell, int $numbVerticalCell)
{
    echo "This is a $numbHorizontalCell by $numbVerticalCell maze";

    $totalCell = $numbHorizontalCell * $numbVerticalCell;

    echo "<div class='grid-container'>";
    for ($i = 0; $i < $totalCell; $i++) {
        echo "<div class='maze-cell'>$i</div>";
    }
    echo "</div>";

}
generateCell(6, 6);
?>
</body>
</html>
