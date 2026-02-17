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
    private ?string $name = null; 

    private function uniqueName(): string {
        return chr(rand(65, 90)) . chr(rand(65, 90)) . str_pad((string)rand(0, 999), 3, '0', STR_PAD_LEFT);
    }

    private function getUniqueName(): string{
            $name = ($this->name) ? $this->name : $this->uniqueName();
            $isUnique = true;
            do {
                    if (!array_key_exists($name, self::$takenNames)){
                        self::$takenNames[$name] = true;
                        $isUnique = false;
                    }else{
                        $name = $this->uniqueName();
                    }
            } while ($isUnique);
            return $name;
    }
    
    public function getName(): string
    {
        if($this->name === null){
            $this->name = $this->getUniqueName();
        }
        return $this->name;
    }

    public function reset(): void
    {
        $this->takeName[$this->name] = false;
        $this->name = null;
    }
}
