<?php

namespace App\Livewire\Comics\User;

use App\Models\Comics\SubCategory;
use Livewire\Component;

class SubCategoryShow extends Component
{
    public function render()
    {
        $subcategory = SubCategory::all();
        return view('livewire.comics.user.sub-category-show', compact('subcategory'));
    }
}
