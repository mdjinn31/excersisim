<?php

declare(strict_types=1);

class TwelveDays
{
    private const DAYS = [
        "first",
        "second",
        "third",
        "fourth",
        "fifth",
        "sixth",
        "seventh",
        "eighth",
        "ninth",
        "tenth",
        "eleventh",
        "twelfth"
    ];

    private const GIFTS = [
        "a Partridge in a Pear Tree",
        "two Turtle Doves",
        "three French Hens",
        "four Calling Birds",
        "five Gold Rings",
        "six Geese-a-Laying",
        "seven Swans-a-Swimming",
        "eight Maids-a-Milking",
        "nine Ladies Dancing",
        "ten Lords-a-Leaping",
        "eleven Pipers Piping",
        "twelve Drummers Drumming"
    ];

    public function recite(int $start, int $end): string
    {
        $verses = [];
        for ($day = $start; $day <= $end; $day++) {
            $verses[] = $this->verse($day);
        }
        return implode("\n", $verses);
    }

    private function verse(int $day): string
    {
        $line = "On the ".self::DAYS[$day - 1]." day of Christmas my true love gave to me: "; 
        $gifts = [];
        for ($i = $day - 1; $i >= 0; $i--) {
            $glue = ($i === 0 && $day > 1) ? "and " : "";
             $gifts[] = $glue . self::GIFTS[$i];
        }
        return $line . implode(", ", $gifts) . ".";
    }
}
