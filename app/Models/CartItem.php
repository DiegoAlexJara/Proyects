<?php

namespace App\Models;

use App\Models\Comics\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'product_id', 'quantity'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación con el carrito
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
