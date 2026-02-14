<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class RobotSimulator
{
    private int $x;
    private int $y;
    private string $direction;
    private array $cardinal = ["north","east","south","west"];
    
    /** @param int[] $position */
    public function __construct(array $position, string $direction)
    {
        $this->x = $position[0];
        $this->y = $position[1];
        $this->direction = $direction;
    }

    private function changeDireccion($orientation){
        $index = array_search($this->direction, $this->cardinal);
        switch($orientation){
            case 'L':
                $index--;
                if($index < 0) {
                    $index = 3;
                }
            break;
            case 'R':
                $index++;
                if($index > 3) {
                    $index = 0;
                }
            break;
        }
        $this->direction = $this->cardinal[$index];
    }

    private function movePosition($orientation){
        match($this->direction){
            'north' => $this->y++,
            'south' => $this->y--,
            'east' => $this->x++,
            'west' => $this->x--
        };
    }
    
    public function instructions(string $instructions): void
    {
        foreach(str_split($instructions) as $direction){
            if($direction === 'A') {
                $this->movePosition($direction);
            }
            else {
                $this->changeDireccion($direction);
            }
        }
    }

    /** @return int[] */
    public function getPosition(): array
    {
        return [$this->x, $this->y];
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}
