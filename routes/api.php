<?php

use App\Http\Controllers\Api\{EventController, UserController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/event', [EventController::class, 'getEvent'])->name('event_api');
Route::get('/events', [EventController::class, 'getAllEvents'])->name('events_api');

Route::get('/user', [UserController::class, 'getUser'])->name('user_api');
Route::get('/users', [UserController::class, 'getAllUsers'])->name('users_api');
