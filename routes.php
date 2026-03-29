<?php

use App\Controllers\AssetController;
use App\Controllers\NoteController;
use PXP\Router\Route;

Route::get('/notes')->do(NoteController::class, 'index');
Route::get('/notes/{uid}')->do(NoteController::class, 'show');

Route::get('/css/{file}')->do(AssetController::class, 'css');
