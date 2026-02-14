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

function frequency(array $input): string{
    $result = "";
    $curent = $input[0];
    $freq = 0;
    foreach($input as $char){
        if($char !== $curent){
            $result .= ($freq > 1) ? "{$freq}{$curent}" : "$curent";
            $curent = $char;
            $freq=0;
        }
        $freq++;
    }
    $result .= ($freq > 1) ? "{$freq}{$curent}" : "$curent";
    return $result;
}

function encode(string $input): string
{
    return frequency(str_split($input));
}

function decode(string $input): string
{
    if($input === '') return '';
    $result = "";
    $chars = str_split($input);
    $size = count($chars);
    $index = 0;
    do{
        $repeat = "1";
        $decodeChar = "";
        if (ctype_digit($chars[$index])) {
            $repeat = $chars[$index];
            if(ctype_digit($chars[$index+1])) {
                $repeat .= $chars[$index+1];
                $index++;
            }
            $index++;
        }
        if (!ctype_digit($chars[$index])) {
            $decodeChar = $chars[$index];
        }
        $index++;
        $result .= str_repeat($decodeChar, (int)$repeat);
    }while($index<$size);
    return $result;
}
