<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
    ];
    public function subcategorias()
    {

        return $this->hasMany(SubCategory::class);

    }
    public function Productos()
    {

        return $this->hasMany(Product::class);
        
    }
}
