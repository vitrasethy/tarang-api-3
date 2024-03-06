<?php

use App\Http\Controllers\SportTypeController;
use App\Http\Controllers\VenueController;
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

Route::middleware(['auth:sanctum'])->get('/user', function () {
    return response()->json(["hello" => "world"]);
});

Route::resource('sport-types', SportTypeController::class);
Route::resource('venues', VenueController::class);
