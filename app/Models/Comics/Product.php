<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'marca_id',
        'subcategory_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);        
    }
}
