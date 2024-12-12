<?php

use App\Http\Controllers\Comics\AuthComicsController;
use App\Http\Controllers\Comics\MainComicsController;
use App\Http\Controllers\Comics\User\UserMainComicsController;
use Illuminate\Support\Facades\Route;

Route::prefix('comics')->group(function () {

    Route::get('/', [AuthComicsController::class, 'showLogin'])
        ->name('comics_ShowLogin');

    Route::post('/', [AuthComicsController::class, 'loginIn'])
        ->name('comics_LoginIn');

    Route::post('/logout', [AuthComicsController::class, 'loginOut'])
        ->name('comics_LoginOut');

    Route::prefix('user')->group(function () {

        Route::get('/', [UserMainComicsController::class, 'inicio'])
            ->name('comics_userInicio');

        Route::prefix('category')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'Categorias'])
                ->name('comics_userCategorys');

            Route::get('/{categoria}', [UserMainComicsController::class, 'CategoriasProducts'])
                ->name('comics_userCategorysProducts');
        });
        Route::prefix('Marcas')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'Marcas'])
                ->name('comics_userMarcas');

            Route::get('/{categoria}', [UserMainComicsController::class, 'MarcasProducts'])
                ->name('comics_userMarcasProducts');
        });
        Route::prefix('sub_category')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'SubCategorias'])
                ->name('comics_userSubCategorys');

            Route::get('/{categorias}', [UserMainComicsController::class, 'SubCategoriasProducts'])
                ->name('comics_userSubCategorysProducts');
        });
    });

    Route::prefix('admin')->group(function () {});
});
