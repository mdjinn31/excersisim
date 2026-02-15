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

class Robot
{
    private static array $takenNames = [];
    private static int $counter = 0;
    private $name = null; 

    private function uniqueName(): string {
        $n = self::$counter++;
        $lettersIndex = intdiv($n, 1000);
        $number = $n % 1000;
        $first = chr(65 + intdiv($lettersIndex, 26));
        $second = chr(65 + ($lettersIndex % 26));
        return $first . $second . str_pad((string)$number, 3, '0', STR_PAD_LEFT);
    }    
    
    public function getName(): string
    {
        if($this->name === null){
            $this->name = $this->uniqueName();
        }
        return $this->name;
    }

    public function reset(): void
    {
        if($this->name !== null){
            unset($this->takenName[$this->name]);
            $this->name = null;
        }
    }    
}
