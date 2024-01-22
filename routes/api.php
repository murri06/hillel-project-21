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

Route::group(['prefix' => 'events', 'as' => 'api_events_'], function () {
    Route::get('/{id}', [EventController::class, 'getEvent'])->name('details');
    Route::post('/edit/{id}', [EventController::class, 'editEvent'])->name('edit');
    Route::get('/', [EventController::class, 'getAllEvents'])->name('list');
    Route::get('/delete/{id}', [EventController::class, 'deleteEvent'])->name('delete');
});

Route::group(['prefix' => 'users', 'as' => 'api_users_'], function () {
    Route::get('/{id}', [UserController::class, 'getUser'])->name('details');
    Route::post('/edit/{id}', [UserController::class, 'editUser'])->name('edit');
    Route::get('/', [UserController::class, 'getAllUsers'])->name('list');
    Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete');
});
