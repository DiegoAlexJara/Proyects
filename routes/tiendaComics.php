<?php

use App\Http\Controllers\Comics\AuthComicsController;
use App\Http\Controllers\Comics\MainComicsController;
use Illuminate\Support\Facades\Route;

Route::prefix('comics')->group(function () {

    Route::get('/', [AuthComicsController::class, 'showLogin'])
        ->name('comics_ShowLogin');

    Route::post('/', [AuthComicsController::class, 'loginIn'])
        ->name('comics_LoginIn');

    Route::post('/logout', [AuthComicsController::class, 'loginOut'])
        ->name('comics_LoginOut');

    Route::prefix('user')->group(function () {

        Route::get('/', [MainComicsController::class, 'inicio'])
            ->name('comics_userInicio');
    });

    Route::prefix('admin')->group(function () {});
});
