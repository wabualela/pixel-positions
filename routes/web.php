<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSearchController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::controller(AuthUserController::class)->group(function () {
    Route::get('/login', 'create')
        ->name('login')
        ->middleware('guest');

    Route::post('/login', 'store')
        ->name('login.store')
        ->middleware('guest');

    Route::delete('/logout', 'destroy')
        ->name('logout')
        ->middleware('auth');
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')
        ->name('register')
        ->middleware('guest');

    Route::post('/register', 'store')
        ->name('register.store')
        ->middleware('guest');
});

// routes
Route::get('/', [ JobController::class, 'index' ])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [ JobController::class, 'create' ])
        ->name('jobs.create');
    Route::post('/jobs', [ JobController::class, 'store' ])
        ->name('jobs.store');
});

Route::get('/jobs/{job}', [ JobController::class, 'show' ])
    ->name('jobs.show');

Route::get('/search', JobSearchController::class)
    ->name('jobs.search');

Route::get('/tags/{tag:name}', TagController::class);