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

function isValid(string $number): bool
{
    if (!preg_match('/^[0-9 ]+$/', $number)) {
        return false;
    }
    $number = str_replace(' ', '', $number);
    if (strlen($number) <= 1) {
        return false;
    }    
    $stripNumber = preg_replace('/\D+/', '', $number);
    $arrayNumber = str_split($stripNumber);
    for($i=count($arrayNumber)-2;$i>=0;$i-=2){
        $double = ($arrayNumber[$i]*2);
        $arrayNumber[$i] = ($double > 9) ? $double - 9 : $double;
    }
    $numSum = array_sum($arrayNumber);
    return ($numSum % 10 != 0) ? false : true;
}

