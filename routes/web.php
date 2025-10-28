<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ScoreboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScoreboardController::class, 'getData'])->name('home');

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'loginAttempt'])->name('auth');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/new', [ScoreboardController::class, 'addPerson'])->name('addPerson');
    Route::post('/new', [ScoreboardController::class, 'confirmAdd'])->name('confirmAdd');

    Route::get('/edit/{id}', [ScoreboardController::class, 'editPerson'])->name('editPerson');
    Route::put('/edit/{id}', [ScoreboardController::class, 'confirmEdit'])->name('confirmEdit');
    Route::delete('/edit/{id}', [ScoreboardController::class, 'deletePerson'])->name('deletePerson');
});
