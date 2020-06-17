<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    Route::resource('seasons', 'SeasonController');
    Route::resource('scores', 'ScoreController');
});

Route::prefix('public')->group(function () {
    Route::resource('matches', 'MatchesController')->only(['index'])->middleware('season.check');
    Route::resource('seasons', 'SeasonController')->middleware('season.check');
    Route::resource('teams', 'TeamController')->middleware('season.check');
});
