<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return (mb_substr(trim($name), 0, 1));
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name)).".";
    }

    public function initials(string $name): string
    {
        $names = explode(" ",$name);
        return $this->initial($names[0])." ".$this->initial($names[1]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $pair1 = $this->initials($sweetheart_a);
        $pair2 = $this->initials($sweetheart_b);
        $heart = <<<HEART
                 ******       ******
               **      **   **      **
             **         ** **         **
            **            *            **
            **                         **
            **     $pair1  +  $pair2     **
             **                       **
               **                   **
                 **               **
                   **           **
                     **       **
                       **   **
                         ***
                          *
            HEART;  
        return $heart;
    }
}
