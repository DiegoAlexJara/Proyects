<?php

use App\Http\Controllers\Repartir\MainRepartirController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\error;
use function Termwind\style;

    Route::get('/', function(){
        return redirect('https://diegojaramillo.lat/portafolio/'); 
    });

Route::get('/repartir', [MainRepartirController::class, 'inicio']);

require __DIR__ . '/postify.php';
require __DIR__ . '/tiendaComics.php';
require __DIR__ . '/finanzas.php';
require __DIR__ . '/repartir.php';