<?php

namespace App\Livewire\Comics\Admin\Products;

use App\Models\Comics\Product;
use Livewire\Component;

class ProductUnit extends Component
{
    public $productId;
    public $CantidadOld;

    public function render()
    {
        if ($this->productId) {
            // Buscar el producto por su ID
            $producto = Product::find($this->productId);

            // Si el producto existe, asignamos su stock
            if ($producto) {
                $this->CantidadOld = $producto->stock;
            } else {
                $this->CantidadOld = 'Producto no encontrado';
            }
        }
        return view('livewire.comics.admin.products.product-unit');
    }
    function desincrementrar()
    {

        $producto = Product::find($this->productId);

        if ($producto) {
            if ($producto->stock > 0) {
                // Descontar una unidad del stock
                $producto->stock -= 1;
                // Guardar los cambios en la base de datos
                $producto->save();
            } else {
                session()->flash('message', 'Stock insuficiente');
            }
        }
    }
    function incrementar()
    {

        $producto = Product::find($this->productId);

        if ($producto) {
            // Incrementar el stock en 1
            $producto->stock += 1;
            // Guardar los cambios en la base de datos
            $producto->save();
        }
    }
}
