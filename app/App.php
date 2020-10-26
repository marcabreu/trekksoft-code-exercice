<?php

namespace App;

use Helpers\CliOutput;
use Lib\Grid;
use Lib\Rover;

class App
{

    public $inputFile;

    public function __construct($inputFilePath)
    {
        $this->inputFile = $inputFilePath;
    }

    public function run()
    {

        $file = fopen($this->inputFile, "r") or die("Unable to open file!");

        $gridDimensions = fgets($file);
        
        $grid = new Grid($gridDimensions);

        $firstRoverPosition = fgets($file);
        $firstRover = new Rover($firstRoverPosition);

        $firstRoverSteps = fgets($file);
        $firstRover->startMooving($firstRoverSteps);

        $firstRover->displayCurrentPosition();

        $secondRoverPosition = fgets($file);
        $secondRover = new Rover($secondRoverPosition);

        $secondRoverSteps = fgets($file);
        $secondRover->startMooving($secondRoverSteps);

        $secondRover->displayCurrentPosition();
    }
    
}