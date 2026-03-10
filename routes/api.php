<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/games', [GamesController::class, 'store']);
Route::get('/games', [GamesController::class, 'index']);
Route::get('/games/{id}', [GamesController::class, 'show']);
Route::put('/games/{id}', [GamesController::class, 'update']);
Route::patch('/games/{id}', [GamesController::class, 'update']);