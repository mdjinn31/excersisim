<?php
require_once 'Size.php';
require_once 'Position.php';

class ProgramWindow
{
    public  $x;
    public  $y;
    public  $height;
    public  $width;

    function __construct(){
        $this->height = 600;
        $this->width = 800;
        $this->x = 0;
        $this->y = 0;
    }

    public function resize(Size $size){
        $this->height = $size->height;
        $this->width = $size->width;
    }

    public function move(Position $position){
        $this->x = $position->x;
        $this->y = $position->y;
    }
}
