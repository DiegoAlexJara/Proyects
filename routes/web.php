<?php

use App\Http\Controllers\Repartir\MainRepartirController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\error;
use function Termwind\style;

Route::get('/', function(){
    $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error 404</title>
            <style>
                body {
                    background-color:rgb(0, 0, 0);
                    color: rgb(173, 173, 173);
                    font-family: Arial, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .error-container {
                    text-align: center;
                    
                }
                .error-container h1 {
                    font-size: 4rem;
                    margin: 0;
                    padding:10px;
                    border-radius: 10px;
                    box-shadow: 0 0 30px rgb(76, 76, 76);
                }
                .error-container p {
                    font-size: 1.2rem;
                   
                }
            </style>
        </head>
        <body>
            <div class="error-container">
                <h1>Error 404</h1>
                <p>Página no encontrada</p>
            </div>
        </body>
        </html>
    ';

    return response($html, 404)
           ->header('Content-Type', 'text/html');

});

Route::get('/repartir', [MainRepartirController::class, 'inicio']);

require __DIR__ . '/postify.php';
require __DIR__ . '/tiendaComics.php';
require __DIR__ . '/finanzas.php';
