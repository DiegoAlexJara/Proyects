<?php

use Illuminate\Support\Facades\Route;

Route::prefix('comics')->group(function () {

    Route::get('/', function () {
        return 'Comics';
    });
    
    
    
});