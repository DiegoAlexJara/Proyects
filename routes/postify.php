<?php

use Illuminate\Support\Facades\Route;


Route::prefix('postify')->group(function () {

    Route::get('/', function () {
        return 'Postify';
    });
    
    
});
