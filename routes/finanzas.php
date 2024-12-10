<?php

use App\Http\Controllers\Finanza\AuthFinanzaController;
use App\Http\Controllers\Finanza\MainFinanzaController;
use App\Http\Controllers\Finanza\UserFinanzaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Finanzas\CheckFinanzasAccess;
use App\Http\Middleware\Finanzas\CheckFinanzasNoAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('finanza')->group(function () {

    Route::get('/', [AuthFinanzaController::class, 'showLogin'])
        ->name('finanza_showLogin')
        ->middleware(CheckFinanzasNoAccess::class);

    Route::post('/', [AuthFinanzaController::class, 'loginIn'])
        ->name('finanza_LoginIn')
        ->middleware(CheckFinanzasNoAccess::class);

    Route::post('/logout', [AuthFinanzaController::class, 'loginOut'])
        ->name('finanza_LoginOut')
        ->middleware(CheckFinanzasAccess::class);

    Route::get('/registro', [UserFinanzaController::class, 'Create'])
        ->name('finanza_NewUser')
        ->middleware(CheckFinanzasNoAccess::class);

    Route::get('Inicio', [MainFinanzaController::class, 'index'])
        ->name('finanza_Inicio')
        ->middleware(CheckFinanzasAccess::class);
        
    Route::get('Report', [MainFinanzaController::class, 'report'])
        ->name('finanza_Report')
        ->middleware(CheckFinanzasAccess::class);
});
