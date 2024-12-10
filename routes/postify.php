<?php

use App\Http\Controllers\Postify\AuthPostifyController;
use App\Http\Controllers\Postify\MainPostifyController;
use App\Http\Controllers\Postify\UserPostifyController;
use App\Http\Middleware\Postify\CheckPostifyAccess;
use App\Http\Middleware\Postify\CheckPostifyNoAccess;
use Illuminate\Support\Facades\Route;


Route::prefix('postify')->group(function () {

    Route::get('/', [AuthPostifyController::class, 'showLogin'])
        ->name('postify_ShowLogin')
        ->middleware(CheckPostifyNoAccess::class);

    Route::post('/', [AuthPostifyController::class, 'loginIn'])
        ->name('postify_LoginIn')
        ->middleware(CheckPostifyNoAccess::class);

    Route::post('/logout', [AuthPostifyController::class, 'loginOut'])
        ->name('postify_LoginOut')
        ->middleware(CheckPostifyAccess::class);

    Route::get('/registro', [UserPostifyController::class, 'Create'])
        ->name('postify_NewUser')
        ->middleware(CheckPostifyNoAccess::class);

    Route::post('/registro', [UserPostifyController::class, 'Store'])
        ->name('postify_CreateUser')
        ->middleware(CheckPostifyNoAccess::class);

    Route::prefix('inicio')->group(function () {

        Route::get('/', [MainPostifyController::class, 'Index'])
            ->name('postify_Inicio')
            ->middleware(CheckPostifyAccess::class);

        Route::get('/search', [MainPostifyController::class, 'search'])
            ->name('postify_search')
            ->middleware(CheckPostifyAccess::class);
    });
    
    Route::get('/visit/{id}', [MainPostifyController::class, 'visit'])
        ->name('postify_visit')
        ->middleware(CheckPostifyAccess::class);

    Route::get('/usuario', [MainPostifyController::class, 'Inicio'])
        ->name('postify_user')
        ->middleware(CheckPostifyAccess::class);
});
