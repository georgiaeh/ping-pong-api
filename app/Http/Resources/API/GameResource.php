<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "winning_score" => $this->winning_score,
            "change_serve" => $this->change_serve,
            "player_1" => [
                "name" => $this->player_1,
                "score" => $this->player_1_score,
                "serving" => $this->serving() === 1,
                "won" => $this->player1Won()
            ],
            "player_2" => [
                "name" => $this->player_2,
                "score" => $this->player_2_score,
                "serving" => $this->serving() === 2,
                "won" => $this->player2Won()
            ]
                
        ];
    }
}
