<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\dondeEstamosController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('inicio');

Route::get('events', [EventController::class, 'index'])
    ->name('events.index');
Route::get('events/create', [EventController::class, 'create'])
    ->name('events.create')
    ->middleware('auth');
Route::post('events', [EventController::class, 'store'])
    ->name('events.store')
    ->middleware('auth');
Route::get('events/{event}', [EventController::class, 'show'])
    ->name('events.show')
    ->middleware('auth');
Route::get('events/{event}/edit', [EventController::class, 'edit'])
    ->name('events.edit')
    ->middleware('auth');
Route::put('events/{event}', [EventController::class, 'update'])
    ->name('events.update')
    ->middleware('auth');
Route::patch('events/{event}', [EventController::class, 'update'])
    ->middleware('auth');
Route::delete('events/{event}', [EventController::class, 'destroy'])
    ->name('events.destroy')
    ->middleware('auth');
Route::post('events/{event}/like', [EventController::class, 'toggleLike'])
    ->name('events.toggleLike')
    ->middleware('auth');
Route::post('events/{event}/players', [EventController::class, 'addPlayer'])
    ->name('events.addPlayer')
    ->middleware('auth');
Route::delete('events/{event}/players/{player}', [EventController::class, 'removePlayer'])
    ->name('events.removePlayer')
    ->middleware('auth');

Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('account', [LoginController::class, 'account'])->name('users.account')->middleware('auth');

Route::get('/dondeEstamos', dondeEstamosController::class)->name('dondeestamos');

Route::resource('players', PlayerController::class);

Route::resource('contact', ContactController::class);
