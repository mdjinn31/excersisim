<?php

class Lasagna
{
    protected int $ovenTime = 40;
    protected int $minutePerLayer = 2;
    
    public function expectedCookTime()
    {
        // Implement the expectedCookTime method
        return $this->ovenTime;
    }

    public function remainingCookTime($elapsed_minutes)
    {
        // Implement the remainingCookTime method
        return $this->ovenTime - $elapsed_minutes;
        
    }

    public function totalPreparationTime($layers_to_prep)
    {
        // Implement the totalPreparationTime method
        return $layers_to_prep * $this->minutePerLayer;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        // Implement the totalElapsedTime method
        return $this->totalPreparationTime($layers_to_prep)+$elapsed_minutes;
    }

    public function alarm()
    {
        // Implement the alarm method
        return "Ding!";
    }
}
