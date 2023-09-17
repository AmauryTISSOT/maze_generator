<?php
class DisplayMaze
{
    public $array = [];
    private $wallArray = ["Top", "Bottom", "Left", "Right"];
    public $showCellNumber = false;

    public function generateAssociativeArray(int $numberOfKeys)
    {
        for ($i = 0; $i <= $numberOfKeys; $i++) {
            $this->array[$i] = $this->wallArray;
        }
        return $this->array;
    }

    public function generateCell(int $numbHorizontalCell, int $numbVerticalCell)
    {
        echo "This is a $numbHorizontalCell by $numbVerticalCell maze";

        $totalCell = $numbHorizontalCell * $numbVerticalCell;
        $gridWidth = $numbHorizontalCell * 50;
        $gridHeight = $numbVerticalCell * 50;

        echo "<div class='grid-container' style='grid-template-columns: repeat($numbHorizontalCell, 1fr); grid-template-rows: repeat($numbVerticalCell, 1fr); width: {$gridWidth}px; height: {$gridHeight}px;'>";
        for ($i = 0; $i < $totalCell; $i++) {
            if ($this->showCellNumber) {
                echo "<div class='maze-cell'>$i</div>";
            } else {
                echo "<div class='maze-cell'></div>";
            }
        }
        echo "</div>";

        $this->generateAssociativeArray($totalCell);
    }

}
