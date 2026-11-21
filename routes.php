<?php

use App\Controllers\MainController;
use App\Controllers\NoteController;
use PXP\Auth\Controllers\LoginController;
use PXP\Auth\Controllers\VerificationController;
use PXP\Auth\Middleware\InteractiveAuth;
use PXP\Auth\Middleware\VerifiedEmail;
use PXP\Http\Controllers\AssetController;
use PXP\Router\Route;

Route::group(
    Route::get('/')->do(MainController::class, 'index')->name('main'),
    Route::get('/home')->do(MainController::class, 'home')->name('home'),

    Route::get('/notes')->do(NoteController::class, 'index')->name('notes'),
    Route::get('/notes/{uid}')->do(NoteController::class, 'show')->name('note'),
)
    ->middleware(InteractiveAuth::class)
    ->middleware(VerifiedEmail::class);

Route::get('/auth/verify')->do(VerificationController::class, 'verify')->name('verify');

Route::group(
    Route::get('/auth/login')->do(LoginController::class, 'form')->name('login'),
    Route::post('/auth/login')->do(LoginController::class, 'login'),
);

Route::group(
    Route::get('/auth/logout')->do(LoginController::class, 'logout')->name('logout'),
    Route::post('/auth/logout')->do(LoginController::class, 'logout'),
)
    ->middleware(InteractiveAuth::class);

Route::group(
    Route::get('/css/{file}')->do(AssetController::class, 'css')->name('css'),

    Route::get('/manifest.json')->do(PWAController::class, 'manifest'),
    Route::get('/icon.svg')->do(PWAController::class, 'icon'),
    Route::get('/app.js')->do(PWAController::class, 'js'),
    Route::get('/sw.js')->do(PWAController::class, 'sw'),
);
