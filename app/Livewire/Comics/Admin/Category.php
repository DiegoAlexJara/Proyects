<?php

namespace App\Livewire\Comics\Admin;

use App\Models\Comics\Category as ComicsCategory;
use Livewire\Component;

class Category extends Component
{
    public $search;
    public $CategoriaNew = false, $editCategoria = false;
    protected $queryString = ['search'];
    public $idCategory;

    public $formData = [
        'name' => '',
        'description' => '',
        'color' => '',
    ];

    public function resetForm()
    {
        $this->formData = [
            'name' => '',
            'description' => '',
            'color' => '',

        ];
    }

    public function render()
    {
        $categories = ComicsCategory::where('name', 'like', "%$this->search%")
            ->paginate(40);
        return view('livewire.comics.admin.category', compact('categories'));
    }

    public function CategoriaNueva()
    {
        $this->CategoriaNew = !$this->CategoriaNew;
        $this->resetForm();
    }

    public function save()
    {

        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'formData.color' => 'required',
        ], [
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'formData.color.required' => 'El color es requerido',
        ]);

        ComicsCategory::create([
            'name' => $this->formData['name'],
            'description' => $this->formData['description'],
            'color' => $this->formData['color'],
        ]);
        $this->resetForm();
        session()->flash('success', 'Categoria Guardado Correctamente');
        $this->CategoriaNueva();
    }

    public function EditarCategoria()
    {
        $this->editCategoria = !$this->editCategoria;
    }

    public function edit($id)
    {
        $marca = ComicsCategory::where('id', $id)
            ->first();


        $this->formData = [
            'name' => $marca->name,
            'description' => $marca->description,
            'color' => $marca->color,
        ];

        $this->idCategory = $id;
        $this->EditarCategoria();
    }

    public function editar() 
    {

        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'formData.color' => 'required',
        ], [
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'formData.color.required' => 'El color es requerido',
        ]);

        $marca = ComicsCategory::where('id', $this->idCategory)
            ->first();
        if ($marca) {
            $marca->update([
                'name' => $this->formData['name'],
                'description' => $this->formData['description'],
                'color' => $this->formData['color'],
            ]);
        } else {
            // Manejo del caso en que no se encuentra el producto
            // Puede ser lanzar un error o devolver una respuesta que indique que no se encontró el producto
        }
        $this->EditarCategoria();
        $this->resetForm();

        session()->flash('success', 'Categoria Editado Correctamente');

        $this->idCategory = '';
    }

    public function delete($id)
    {
        $marca = ComicsCategory::where('id', $id)
            ->first();

        $marca->delete();
        session()->flash('success', 'Categoria Eliminada Correctamente');
    }

}
