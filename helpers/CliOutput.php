<?php

namespace Helpers;

class CliOutput
{
    
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out("\n");
    }

    public function display($message)
    {
        $this->out($message);
        $this->newline();
    }

}