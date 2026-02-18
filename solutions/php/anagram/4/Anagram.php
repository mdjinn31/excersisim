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

function iSAnagram(array $word, string $option){
    $optionArray = str_split($option);
    sort($optionArray);
    return implode("", $word) === implode("", $optionArray);
}

function detectAnagrams(string $word, array $anagrams): array
{
    $areAnagrams = [];
    $wordArray = str_split(mb_strtoupper($word));
    sort($wordArray);
    foreach ($anagrams as $value) {
        if ((iSAnagram($wordArray, mb_strtoupper($value))) && ($word !== mb_strtoupper($value))){
            $areAnagrams[] = $value;
        }
    }
    return $areAnagrams;
}
