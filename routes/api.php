<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Model\Game;

use App\Http\Controllers\API\GameController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/history", [GameController::class, "history"]);

Route::group(["prefix" => "/games"], function () {
    Route::post("", [GameController::class, "store"]);
    Route::get("/{game}", [GameController::class, "show"]);
    Route::patch("/{game}/score", [GameController::class, "score"]);
    Route::delete("/{game}", [GameController::class, "destroy"]);
});