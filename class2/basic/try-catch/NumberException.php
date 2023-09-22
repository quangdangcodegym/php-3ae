<?php
class NumberException extends Exception
{
    // public function getMessage()
    // {
    //     return "Invalid number";
    // }

    public function errorMessage()
    {
        return 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
    }
}
