<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[EventController::class,'getAllMeetings']);
Route::get('/meetings/{id}/events', [EventController::class, 'getEvents']);
Route::get('/events/{id}/places', [EventController::class, 'getPlacesOfEvents']);
Route::post('/events/{id}/reserve', [EventController::class, 'toBookPlace']);
