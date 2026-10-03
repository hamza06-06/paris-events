<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get(
    '/',
    [EventController::class, 'index']
)->name('events.index');

Route::get(
    '/events/{id}',
    [EventController::class, 'show']
)->name('events.show');