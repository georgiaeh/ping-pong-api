<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "player_1" => ["required", "string", "max:50"],
            "player_2" => ["required", "string", "max:50"],
            "winning_score" => ["integer", "min:1"],
            "change_serve" => ["integer", "min:1"]
        ];
    }
}
