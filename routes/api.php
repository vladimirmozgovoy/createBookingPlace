<?php

use App\Http\Controllers\EventApiController;
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
Route::get('/meetings', [EventApiController::class, 'getAllMeetings']);
Route::get('/meetings/{id}/events', [EventApiController::class, 'getEvents']);
Route::get('/events/{id}/places', [EventApiController::class, 'getPlacesOfEvents']);
Route::post('/events/{id}/reserve', [EventApiController::class, 'toBookPlace']);
