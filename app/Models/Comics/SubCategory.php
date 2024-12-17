<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'color',
        'category_id',
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Productos()
    {

        return $this->hasMany(Product::class);
        
    }
}
