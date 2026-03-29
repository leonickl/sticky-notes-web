<?php

use App\Controllers\NoteController;
use PXP\Router\Route;
use App\Controllers\AssetController;

Route::get('/notes')->do(NoteController::class, 'index');
Route::get('/notes/{uid}')->do(NoteController::class, 'show');

Route::get('/css/{file}')->do(AssetController::class, 'css');
