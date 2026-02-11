<?php
class Size{
    public $width;
    public $height;

    public function __construct($height, $width){
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(){
        return $this->width;
    }

    public function getHeight(){
        return $this->heigth;
    }
}