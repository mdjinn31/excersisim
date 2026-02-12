<?php
class Position{
    public $x;
    public $y;

    public function __construct($y, $x){
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(){
        return $this->x;
    }

    public function getY(){
        return $this->y;
    }
} 