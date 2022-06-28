<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MatchProfileController;
use App\Http\Controllers\UserController;
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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('panel.home');
    });
    Route::resource('users', UserController::class)->middleware('can:user-list');
    Route::resource('matches', MatchProfileController::class)->middleware('can:match-list');

    Route::get('events/{id}', [EventController::class, 'index'])->middleware('can:event-list');
    Route::get('events/{id}/create', [EventController::class, 'create'])->middleware('can:event-create');
    Route::post('events/{id}', [EventController::class, 'store'])->middleware('can:event-create');
    Route::any('delete-event/{id}', [EventController::class, 'delete'])->middleware('can:event-delete');
    Route::get('events/edit/{id}', [EventController::class, 'edit'])->middleware('can:event-edit');
    Route::any('events/update/{id}', [EventController::class, 'update'])->middleware('can:event-edit');
});


