<?php
class DisplayMaze
{
    public $array = [];
    public $numberOfHorizontalCell;
    public $numberOfVerticalCell;
    //private $wallArray = ["Top", "Bottom", "Left", "Right"];
    public $showCellNumber = false;

    public function __construct($arrayParam)
    {
        $this->array = $arrayParam;
        $this->numberOfHorizontalCell = count($this->array);
        $this->numberOfVerticalCell = count($this->array[0]);
    }

    private function borderHandling($i, $j)
    {
        $arr = [];

        $cssBorderTop = 'border-top: 2px solid black;';
        $cssBorderRight = 'border-right: 2px solid black;';
        $cssBorderBottom = 'border-bottom: 2px solid black;';
        $cssBorderLeft = 'border-left: 2px solid black;';

        if ($this->array[$i][$j]->wall[0]) {
            $arr[] = $cssBorderTop;
        }
        if ($this->array[$i][$j]->wall[1]) {
            $arr[] = $cssBorderRight;
        }
        if ($this->array[$i][$j]->wall[2]) {
            $arr[] = $cssBorderBottom;
        }
        if ($this->array[$i][$j]->wall[3]) {
            $arr[] = $cssBorderLeft;
        }

        return implode(" ", $arr);
    }

    public function showMaze()
    {
        $gridWidth = $this->numberOfHorizontalCell * 50;
        $gridHeight = $this->numberOfVerticalCell * 50;

        // grid-container start
        echo "<div class='grid-container' style='grid-template-columns: repeat($this->numberOfHorizontalCell, 1fr); grid-template-rows: repeat($this->numberOfVerticalCell, 1fr); width: {$gridWidth}px; height: {$gridHeight}px; back'>";

        for ($i = 0; $i < count($this->array); $i++) {
            for ($j = 0; $j < count($this->array); $j++) {

                $backgroundColor = $this->array[$i][$j]->visited ? "red" : "";

                echo "<div class='maze-cell' id ='$i-$j'
                style=
                '
                grid-row:" . ($this->array[$i][$j]->x) + 1 . " / " . $i + 2 . ";
                grid-column:" . $this->array[$i][$j]->y + 1 . " / " . $j + 2 . ";
                background-color: $backgroundColor;
                font-size: 14px;" . $this->borderHandling($i, $j) . "
                '
                 >";
                if ($this->showCellNumber) {
                    echo "X$i,Y$j";
                }
                echo "</div>";
            }
        }

        // grid-container end
        echo "</div>";
    }

}
