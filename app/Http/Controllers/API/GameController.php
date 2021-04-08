<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Game;
use App\Http\Requests\API\GameRequest;
use App\Http\Requests\API\ScoreRequest;
use App\Http\Resources\API\GameResource;

class GameController extends Controller
{

    public function store(GameRequest $request)
    {
        $data = $request->all();
        $game = Game::create($data);

        return new GameResource($game);
    }

    public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function history()
    {
        $games = Game::all();
        $games->pop();
        return GameResource::collection($games);
    }

    public function score(ScoreRequest $request, Game $game)
    {

        $game->score($request->get("player"));

        return new GameResource($game);
    }

    public function destroy(Request $request, Game $game)
    {
        $game->delete();
        return response(null, 204);
    }
}