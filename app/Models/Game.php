<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ["player_1", "player_2", "winning_score", "change_serve"];

    protected $attributes = [
        "player_1_score" => 0,
        "player_2_score" => 0,
        "winning_score" => 21,
        "change_serve" => 5,
    ];

    public function score(int $player) : Game
    {
        $prop = "player_${player}_score";
        $this->$prop += 1;
        $this->save();
        return $this;
    }

    public function serving() : int
    {
        $total = $this->player_1_score + $this->player_2_score;
       
        if($this->player_1_score > ($this->winning_score -2) && $this->player_2_score > ($this->winning_score -2)){
            
            return (floor($total / 2) % 2) === 0 ? 1 : 2;
        
        } else {

            return (floor($total / $this->change_serve) % 2) === 0 ? 1 : 2;
        }
    }

    public function player1Won() : bool
    {
        return $this->player_1_score >= $this->winning_score
            && $this->player_1_score - $this->player_2_score > 1;
    }

    public function player2Won() : bool
    {
        return $this->player_2_score >= $this->winning_score
            && $this->player_2_score - $this->player_1_score > 1;
    }

}