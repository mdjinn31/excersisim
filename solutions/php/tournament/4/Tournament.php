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

class Tournament
{
    private string $table;
    private $placeHolder = "*Team*|  *MP* |  *W* |  *D* |  *L* |  *P*";
    private $map = [];
    public const DEFAULT_STATS = ["MP"=>0,"W"=>0,"D"=>0,"L"=>0,"P"=>0];
    
    public function __construct()
    {
        $this->table = "Team                           | MP |  W |  D |  L |  P\n";
    }
 
    public function tally($scores){
        if(strlen($scores)>0){
            $this->makeScoreTable(explode("\n",$scores));
        }
        return rtrim($this->table);
    }

    private function makeScoreTable($games){
        foreach($games as $game){
            $this->setRresults(explode(";", $game));
        }
        $this->setPoints();
        $this->renderTable();
    }

    private function setRresults($game){
        if(!array_key_exists($game[0],$this->map)){
            $this->map[$game[0]] = self::DEFAULT_STATS;
        }
        if(!array_key_exists($game[1],$this->map)){
            $this->map[$game[1]] = self::DEFAULT_STATS;
        }
        $this->setScores($game);
    }

    private function setScores($game){
        $this->map[$game[0]]['MP']++;
        $this->map[$game[1]]['MP']++;
        switch($game[2]){
            case "win":
                $this->map[$game[0]]['W']++;
                $this->map[$game[1]]['L']++;
            break;
            case "loss":
                $this->map[$game[1]]['W']++;
                $this->map[$game[0]]['L']++;
            break;
            case "draw":
                $this->map[$game[0]]['D']++;
                $this->map[$game[1]]['D']++;
            break;
        }
    }

    private function setPoints(){
        $keys = array_keys($this->map);
        for($i=0;$i<count($keys);$i++){
            $this->map[$keys[$i]]["P"] = ($this->map[$keys[$i]]["W"]*3) + ($this->map[$keys[$i]]["D"]*1);
        }
    }

    private function formatName(string $name): string{
            return $name.str_repeat(" ", (31 - strlen($name)));
    }

    private function renderTable(){
        ksort($this->map);
        array_multisort(array_column($this->map, 'P'), SORT_DESC, $this->map);
        $keys = array_keys($this->map);
        for($i=0;$i<count($keys);$i++){
            $search = ["*Team*","*MP*","*W*","*D*","*L*","*P*"];
            $replace = [$this->formatName($keys[$i]),
                        $this->map[$keys[$i]]["MP"],
                        $this->map[$keys[$i]]["W"],
                        $this->map[$keys[$i]]["D"],
                        $this->map[$keys[$i]]["L"],
                        $this->map[$keys[$i]]["P"]];
            $this->table .= str_replace($search, $replace, $this->placeHolder);
            $this->table .= "\n";
        }
       // echo $this->table;
    }
}
