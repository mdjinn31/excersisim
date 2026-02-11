<?php

class PizzaPi
{
    protected $minDough = 200;
    protected $extraPerPerson = 20;
    protected $saucePerPizza = 125;
    protected const PI = 3.1416;
    protected const CUBE = 3;
    protected const SLICE_PER_PIZZA = 8;
    
    public function calculateDoughRequirement($pizzas, $persons)
    {
        return $pizzas * (($persons * $this->extraPerPerson) + $this->minDough);
    }

    public function calculateSauceRequirement($pizzas, $canVolume)
    {
        return $pizzas * ($this->saucePerPizza/$canVolume);
    }

    public function calculateCheeseCubeCoverage($cheese_dimensions, $thickness, $diameter)
    {
        return floor((pow($cheese_dimensions, $this::CUBE)) / ($thickness * $this::PI * $diameter));    
    }

    public function calculateLeftOverSlices($pizzas, $friends)
    {
        return ($pizzas * $this::SLICE_PER_PIZZA) % $friends;
    }
}
