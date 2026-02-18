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
    private $map = [];
    public const PLACE_HOLDER = "%-31s|  %d |  %d |  %d |  %d |  %d";
    public const DEFAULT_STATS = ["MP"=>0,"W"=>0,"D"=>0,"L"=>0,"P"=>0];
    
    public function __construct()
    {
        $this->table = "Team                           | MP |  W |  D |  L |  P\n";
    }
 
    public function tally($scores){
        if(strlen($scores)>0){
            $this->parseResults(explode("\n",$scores));
            $this->setPoints();
            $this->sortResults();
            $this->renderTable();
        }
        return rtrim($this->table);
    }

    private function parseResults($games){
        foreach($games as $game){
            [$team1, $team2, $result] = explode(";", $game);
            $this->setDefaults($team1, $team2);
            $this->setScores($team1, $team2, $result);
        }
    }

    private function setDefaults($team1, $team2){
        if(!array_key_exists($team1,$this->map)){
            $this->map[$team1] = self::DEFAULT_STATS;
        }
        if(!array_key_exists($team2,$this->map)){
            $this->map[$team2] = self::DEFAULT_STATS;
        }
    }

    private function setScores($team1, $team2, $result){
        $this->map[$team1]['MP']++;
        $this->map[$team2]['MP']++;
        switch($result){
            case "win":
                $this->map[$team1]['W']++;
                $this->map[$team2]['L']++;
            break;
            case "loss":
                $this->map[$team2]['W']++;
                $this->map[$team1]['L']++;
            break;
            case "draw":
                $this->map[$team1]['D']++;
                $this->map[$team2]['D']++;
            break;
        }
    }

    private function setPoints(){
        $teams = array_keys($this->map);
        foreach($teams as $team){
            $this->map[$team]["P"] = ($this->map[$team]["W"]*3) + ($this->map[$team]["D"]*1);
        }
    }
    
    private function sortResults(){
        ksort($this->map);
        array_multisort(array_column($this->map, 'P'), SORT_DESC, $this->map);
    }

    private function renderTable(){
        $teams = array_keys($this->map);
        foreach($teams as $team){
            $this->table .= sprintf(
                                self::PLACE_HOLDER,
                                $team,$this->map[$team]["MP"],
                                $this->map[$team]["W"],
                                $this->map[$team]["D"],
                                $this->map[$team]["L"],
                                $this->map[$team]["P"]
                            )."\n";
        }
    }
}
