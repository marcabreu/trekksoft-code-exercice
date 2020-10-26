<?php

namespace Lib;

use Helpers\CliOutput;

class Rover
{
    private $cardinalPoints = ['N', 'E', 'S', 'W'];

    protected $x;

    protected $y;

    protected $orientation;

    protected $output;

    public function __construct($initialPosition)
    {
        $initialPosition = explode(" ", trim($initialPosition));

        $this->x = (int) $initialPosition[0];

        $this->y = (int) $initialPosition[1];

        $this->orientation = $initialPosition[2];

        $this->output = new CliOutput;
    }

    public function startMooving($steps)
    {
        $steps = str_split(trim($steps));

        foreach($steps as $step){
            switch($step){
                case "L":
                    $this->turnLeft();
                    break;
                case "R":
                    $this->turnRight();
                    break;
                case "M":
                    $this->move();
                    break;
            }
        }

    }

    public function move()
    {
        switch($this->orientation){
            case 'N':
                $this->y+=1;
                break;
            case 'E':
                $this->x+=1;
                break;
            case 'S':
                $this->y-=1;
                break;
            case 'W':
                $this->x-=1;
                break;
        }

    }

    public function turnLeft()
    {

        $currentPosition = array_search($this->orientation, $this->cardinalPoints);
        $nextPosition = $currentPosition - 1;
        $this->orientation = isset($this->cardinalPoints[$nextPosition]) ? $this->cardinalPoints[$nextPosition] : $this->cardinalPoints[3];  
    }

    public function turnRight()
    {
        $currentPosition = array_search($this->orientation, $this->cardinalPoints);
        $nextPosition = $currentPosition + 1;
        $this->orientation = isset($this->cardinalPoints[$nextPosition]) ? $this->cardinalPoints[$nextPosition] : $this->cardinalPoints[0];
    }
    
    public function displayCurrentPosition()
    {
        $this->output->display("{$this->x} {$this->y} {$this->orientation}");
    }
}