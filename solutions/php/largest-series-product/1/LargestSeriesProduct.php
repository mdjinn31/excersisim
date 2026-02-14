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

class Series
{
    
    public function __construct(public string $input, public int $span = 0)
    {

    }

    public function largestProduct(int $span): int
    {
        if($span == 0) return 1;
        
        if((strlen($this->input)<$span)||($span<0)||(!is_numeric($this->input))){
            throw new \InvalidArgumentException("Span must be the same leght of serie ");
        }
        if(($span == 0)) return 1;
        $this->span = $span;
        $series = $this->makeSeries();
        return max($series);
    }

    private function makeSeries():array{
        $return = [];
        $inputSeries = str_split($this->input);
        for($i=0;$i<=count($inputSeries)-$this->span;$i++){
            $return[] = array_slice($inputSeries,$i,$this->span);
        }
        return $this->productSeries($return);
    }

    private function productSeries(array $series): array{
        $products = [];
        foreach($series as $serie){
            $products[] = array_product($serie);
        }
        return $products;
    }
}
