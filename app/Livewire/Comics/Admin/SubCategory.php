<?php

namespace App\Livewire\Comics\Admin;

use App\Models\Comics\Category;
use App\Models\Comics\SubCategory as ComicsSubCategory;
use Livewire\Component;

class SubCategory extends Component
{

    public $search;
    protected $queryString = ['search'];
    public $idSubCategoria;
    public $SubCategoriaNew = false, $editSubCategoria = false;

    public $formData = [
        'name' => '',
        'description' => '',
        'color' => '',
        'category_id' => '',
    ];

    public function resetForm()
    {
        $this->formData = [
            'name' => '',
            'description' => '',
            'color' => '',
            'category_id' => '',
        ];
    }

    public function render()
    {
        $categorys = Category::all();
        $subCategory = ComicsSubCategory::where('name', 'like', "%$this->search%")
            ->paginate(20);
        return view('livewire.comics.admin.sub-category', compact('subCategory', 'categorys'));
    }

    public function SubCategoriaNueva()
    {
        $this->SubCategoriaNew = !$this->SubCategoriaNew;
        $this->resetForm();
    }

    public function save()
    {

        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'formData.color' => 'required',
            'formData.category_id' => 'required',
        ], [
            
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'formData.color.required' => 'El color es requerido',
            'formData.category_id.required' => 'La categoria es requerido',

        ]);

        ComicsSubCategory::create([
            'name' => $this->formData['name'],
            'description' => $this->formData['description'],
            'color' => $this->formData['color'],
            'category_id' => $this->formData['category_id'],
        ]);
        $this->resetForm();
        session()->flash('success', 'Sub-Categoria Guardado Correctamente');
        $this->SubCategoriaNueva();
    }

    public function EditarSubCategory()
    {
        $this->editSubCategoria = !$this->editSubCategoria;
    }

    function edit($id)
    {
        $products = ComicsSubCategory::where('id', $id)
            ->first();


        $this->formData = [
            'name' => $products->name,
            'description' => $products->description,
            'color' => $products->color,
            'category_id' => $products->category_id,
        ];
        $this->idSubCategoria = $id;
        $this->EditarSubCategory();
    }

    function editar()
    {
        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'formData.color' => 'required',
            'formData.category_id' => 'required',
        ], [
            
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'formData.color.required' => 'El color es requerido',
            'formData.category_id.required' => 'La categoria es requerido',

        ]);

        $products = ComicsSubCategory::where('id', $this->idSubCategoria)
            ->first();
        if ($products) {
            $products->update([
                'name' => $this->formData['name'],
                'description' => $this->formData['description'],
                'color' => $this->formData['color'],
                'category_id' => $this->formData['category_id'],
            ]);
        } else {
            // Manejo del caso en que no se encuentra el producto
            // Puede ser lanzar un error o devolver una respuesta que indique que no se encontró el producto
        }
        $this->EditarSubCategory();
        $this->resetForm();

        session()->flash('success', 'SubCategoria Editado Correctamente');

        $this->idSubCategoria = '';
    }

    function delete($id)
    {

        $products = ComicsSubCategory::where('id', $id)
            ->first();

        $products->delete();
        session()->flash('success', 'Producto Eliminado Correctamente');
    }

}
