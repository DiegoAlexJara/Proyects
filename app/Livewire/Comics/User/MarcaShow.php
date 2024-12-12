<?php

namespace App\Livewire\Comics\User;

use App\Models\Comics\Marca;
use Livewire\Component;

class MarcaShow extends Component
{
    public function render()
    {
        $marcas = Marca::all();
        return view('livewire.comics.user.marca-show', compact('marcas'));
    }
}
