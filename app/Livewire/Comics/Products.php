<?php

namespace App\Livewire\Comics;

use App\Models\Comics\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $products = Product::where('name', 'like', "%$this->search%")->paginate(40);
        return view('livewire.comics.products', compact('products'));
    }

}
