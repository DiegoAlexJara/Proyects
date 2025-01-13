<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    protected $table = 'pagos';
    protected $fillable = [
        'domicilio',
        'precio',
        'propina',
        'total',
    ];
    
}
