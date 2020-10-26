<?php

namespace Lib;

class Grid
{
    protected $maxX;

    protected $maxY;

    public function __construct($dimensions)
    {
        $dimensions = explode(" ", trim($dimensions));

        $this->maxX = $dimensions[0];
        $this->maxY = $dimensions[1];
    }
    
}