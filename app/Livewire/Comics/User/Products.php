<?php

namespace App\Livewire\Comics\User;

use App\Models\Comics\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{

    use WithPagination;

    public $name;
    public $model;
    public $search;
    public $BDDType;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {

        if(!empty($this->name))
        {
            $category = $this->model::where('name', $this->name)->first();
            if($this->model === \App\Models\Comics\Category::class){
                $this->BDDType = 'category_id';
            }
            else if($this->model === \App\Models\Comics\Marca::class){
                $this->BDDType = 'marca_id';
            }
            else{
                $this->BDDType = 'subcategory_id';
            }
            $products = Product::where('name', 'like', "%$this->search%")->where($this->BDDType, $category->id)->paginate(20);

            
        }
        else{
            $products = Product::where('name', 'like', "%$this->search%")->paginate(20);
        }
        return view('livewire.comics.user.products', compact('products'));
    }
}
