<?php

namespace App\Livewire\Comics\Admin;

use App\Models\Comics\Marca;
use Livewire\Attributes\On;
use Livewire\Component;

class Marcas extends Component
{
    public $search; 
    public $idMarca;
    public $MarcaNew = false, $editMarca = false, $showSquare = false;
    public $idImage;
    protected $queryString = ['search'];

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

    public function toggleSquare($id)
    {
        $this->idImage = $id;
        $this->openModal();
    }

    #[On('editar-imagen')]
    function openModal()
    {
        $this->showSquare = !$this->showSquare;
    }

    public function render()
    {
        $marcas = Marca::where('name', 'like', "%$this->search%")
            ->paginate(20);
        return view('livewire.comics.admin.marcas', compact('marcas'));
    }

    public function MarcaNueva()
    {
        $this->MarcaNew = !$this->MarcaNew;
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

        Marca::create([
            'name' => $this->formData['name'],
            'description' => $this->formData['description'],
            'color' => $this->formData['color'],
        ]);
        $this->resetForm();
        session()->flash('success', 'Marca Guardado Correctamente');
        $this->MarcaNueva();
    }

    public function EditarMarca()
    {
        $this->editMarca = !$this->editMarca;
    }

    public function edit($id)
    {
        $marca = Marca::where('id', $id)
            ->first();


        $this->formData = [
            'name' => $marca->name,
            'description' => $marca->description,
            'color' => $marca->color,
        ];

        $this->idMarca = $id;
        $this->EditarMarca();
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

        $marca = Marca::where('id', $this->idMarca)
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
        $this->EditarMarca();
        $this->resetForm();

        session()->flash('success', 'Producto Editado Correctamente');

        $this->idMarca = '';
    }

    public function delete($id)
    {
        $marca = Marca::where('id', $id)
            ->first();

        $marca->delete();
        session()->flash('success', 'Marca Eliminada Correctamente');
    }
}
