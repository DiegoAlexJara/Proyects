<?php

use App\Http\Controllers\Repartir\MainRepartirController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\error;
use function Termwind\style;

Route::get('/repartir', [MainRepartirController::class, 'inicio'])
    ->name('repartir_Inicio');

Route::get('/repartir/fechas', [MainRepartirController::class, 'fechas'])
    ->name('repartir_Fechas');
