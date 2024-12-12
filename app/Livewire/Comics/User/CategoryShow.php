<?php

namespace App\Livewire\Comics\User;

use App\Models\Comics\Category;
use Livewire\Component;

class CategoryShow extends Component
{
    public function render()
    {
        $category = Category::all();
        return view('livewire.comics.user.category-show', compact('category'));
    }
}
