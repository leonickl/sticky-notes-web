<?php

use App\Controllers\AssetController;
use App\Controllers\LoginController;
use App\Controllers\NoteController;
use App\Controllers\MainController;
use PXP\Http\Middleware\InteractiveAuth;
use PXP\Router\Route;

Route::get('/')
    ->do(NoteController::class, 'index')
    ->middleware(InteractiveAuth::class);

Route::get('/home')
    ->do(MainController::class, 'index')
    ->middleware(InteractiveAuth::class);

Route::get('/notes')
    ->do(NoteController::class, 'index')
    ->middleware(InteractiveAuth::class);

Route::get('/notes/{uid}')
    ->do(NoteController::class, 'show')
    ->middleware(InteractiveAuth::class);

Route::get('/css/{file}')
    ->do(AssetController::class, 'css');

Route::get('/manifest.json')
    ->do(AssetController::class, 'manifest');

Route::get('/icon.svg')
    ->do(AssetController::class, 'icon');

Route::get('/app.js')
    ->do(AssetController::class, 'appJs');

Route::get('/sw.js')
    ->do(AssetController::class, 'sw');

Route::get('/login')->do(LoginController::class, 'form');
Route::post('/login')->do(LoginController::class, 'login');

Route::get('/logout')->do(LoginController::class, 'logout');
Route::post('/logout')->do(LoginController::class, 'logout');
