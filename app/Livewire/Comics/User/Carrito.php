<?php

namespace App\Livewire\Comics\User;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Comics\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Carrito extends Component
{
    public $products;
    public $total;

    public function render()
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        return view('livewire.comics.user.carrito', compact('cart'));
    }

    function delete($Id, $productId)
    {
        $Producto = Product::find($productId);

        $cart = CartItem::find($Id);

        $cart->delete();
        $this->render();
        Session::flash('message', 'Se elimino el producto del carrito');
    }
    
    function Disminuir($Id, $productId)
    {

        $cart = CartItem::find($Id);
        $cart->quantity -= 1;
        $cart->save();

        if($cart->quantity == 0) $cart->delete();
        $this->render();
    }

}
