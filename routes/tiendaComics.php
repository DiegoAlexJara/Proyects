<?php

use App\Http\Controllers\Comics\Admin\AdminMainComicsController;
use App\Http\Controllers\Comics\AuthComicsController;
use App\Http\Controllers\Comics\MainComicsController;
use App\Http\Controllers\Comics\User\UserMainComicsController;
use App\Http\Middleware\Comic\CheckComicAccess;
use App\Http\Middleware\Comic\CheckComicNoAccess;
use Illuminate\Support\Facades\Route;

Route::prefix('comics')->group(function () {

    Route::get('/', [AuthComicsController::class, 'showLogin'])
        ->name('comics_ShowLogin')
        ->middleware(CheckComicNoAccess::class);

    Route::post('/', [AuthComicsController::class, 'loginIn'])
        ->name('comics_LoginIn')
        ->middleware(CheckComicNoAccess::class);

    Route::post('/logout', [AuthComicsController::class, 'loginOut'])
        ->name('comics_LoginOut')
        ->middleware(CheckComicAccess::class);

    Route::prefix('user')->group(function () {

        Route::get('/', [UserMainComicsController::class, 'inicio'])
            ->name('comics_userInicio')
            ->middleware(CheckComicAccess::class);

        Route::prefix('category')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'Categorias'])
                ->name('comics_userCategorys')
                ->middleware(CheckComicAccess::class);

            Route::get('/{categoria}', [UserMainComicsController::class, 'CategoriasProducts'])
                ->name('comics_userCategorysProducts')
                ->middleware(CheckComicAccess::class);
        });

        Route::prefix('Marcas')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'Marcas'])
                ->name('comics_userMarcas')
                ->middleware(CheckComicAccess::class);

            Route::get('/{categoria}', [UserMainComicsController::class, 'MarcasProducts'])
                ->name('comics_userMarcasProducts')
                ->middleware(CheckComicAccess::class);
        });

        Route::prefix('sub_category')->group(function () {

            Route::get('/', [UserMainComicsController::class, 'SubCategorias'])
                ->name('comics_userSubCategorys')
                ->middleware(CheckComicAccess::class);

            Route::get('/{categorias}', [UserMainComicsController::class, 'SubCategoriasProducts'])
                ->name('comics_userSubCategorysProducts')
                ->middleware(CheckComicAccess::class);
        });

        Route::get('/contacto', [UserMainComicsController::class, 'comment'])
            ->name('comics_userComment')
            ->middleware(CheckComicAccess::class);

        Route::get('/carrito', [UserMainComicsController::class, 'carrito'])
            ->name('comics_userCarrito')
            ->middleware(CheckComicAccess::class);
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminMainComicsController::class, 'inicio'])
            ->name('comics_adminInicio')
            ->middleware('permission:mode_admin');

        Route::get('/products', [AdminMainComicsController::class, 'products'])
            ->name('comics_adminProducts')
            ->middleware('permission:view_products');

        Route::get('/marcas', [AdminMainComicsController::class, 'marcas'])
            ->name('comics_adminMarcas')
            ->middleware('permission:view_marcas');

        Route::get('/categorias', [AdminMainComicsController::class, 'categorias'])
            ->name('comics_admincategorias')
            ->middleware('permission:view_categorias');

        Route::get('/sub-categorias', [AdminMainComicsController::class, 'subcategorias'])
            ->name('comics_adminsubcategorias')
            ->middleware('permission:view_subcategorias');
    });
    
});
