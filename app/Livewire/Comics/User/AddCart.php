<?php

namespace App\Livewire\Comics\User;

use App\Models\Cart;
use App\Models\Comics\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddCart extends Component
{
    public $showSquare;
    public $producId;
    public $producStock;
    public $producto;
    public $stock = 1;

    public function mount($producId)
    {
        $this->producId = $producId;
    }
    public function render()
    {
        $this->producto = Product::find($this->producId);
        $this->producStock = $this->producto->stock;
        if ($this->stock >  $this->producStock) $this->stock = $this->producStock;
        if ($this->stock < 0) $this->stock = 1;
        return view('livewire.comics.user.add-cart');
    }

    public function toggleSquare()
    {
        $this->stock = 1;
        $this->showSquare = !$this->showSquare;
    }
    function submit()
    {

        $this->showSquare = false;
        // Buscar el carrito del usuario (puedes usar Auth::id() si tienes autenticación)
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        // Verificar si el producto ya está en el carrito
        $cartItem = $cart->items()->where('product_id', $this->producId)->first();

        if ($cartItem) {
            // Si ya está en el carrito, incrementa la cantidad
            $cartItem->quantity += $this->stock;
            $cartItem->save();
        } else {
            // Si no está en el carrito, lo agregamos
            $cart->items()->create([
                'product_id' => $this->producId,
                'quantity' => $this->stock,
            ]);

        }
        
        $this->producto->save();
        Session::flash('message', 'Se mandó a carrito');
        $this->render();
    }
}
