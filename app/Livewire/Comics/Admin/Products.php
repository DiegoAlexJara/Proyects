<?php

namespace App\Livewire\Comics\Admin;

use App\Models\Comics\Category;
use App\Models\Comics\Marca;
use App\Models\Comics\Product;
use App\Models\Comics\SubCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $search;
    public $ProductNew = false, $editProduct = false, $showSquare = false;
    public $price = 1, $stock = 1;
    public $idProduct;
    protected $queryString = ['search'];
    public $idImage;


    public $formData = [
        'name' => '',
        'description' => '',
        'marca_id' => '',
        'category_id' => '',
        'subcategory_id' => '',
    ];

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

    public function updatingSearch()
    {
        // dd('');
        $this->resetPage();
        // $this->render();
    }

    public function resetForm()
    {
        $this->formData = [
            'name' => '',
            'description' => '',
            'marca_id' => '',
            'category_id' => '',
            'subcategory_id' => '',
        ];
        $this->price = 1;
        $this->stock = 1;
    }

    public function render()
    {
        $marcas  = Marca::all();
        $categorys = Category::all();
        $subCategorys = SubCategory::all();

        $products = Product::where('name', 'like', "%$this->search%")
            ->paginate(20);


        return view('livewire.comics.admin.products', compact('products', 'marcas', 'categorys', 'subCategorys'));
    }
    public function updatedPrice($value)
    {
        if ($value < 0) {
            $this->price = 1;
        }
    }

    public function updatedStock($value)
    {
        if ($value < 1) {
            $this->stock = 1;
        }
    }

    public function NuevoProducto()
    {
        $this->ProductNew = !$this->ProductNew;
        $this->resetForm();
    }

    public function EditarProducto()
    {
        $this->editProduct = !$this->editProduct;
    }


    //CRUD
    
    function save()
    {
        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'price' => 'required',
            'formData.marca_id' => 'required',
            'formData.category_id' => 'required',
            'formData.subcategory_id' => 'required',
            'stock' => 'required',
        ], [
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'price.required' => 'El precio es requerido',
            'formData.marca_id.required' => 'La marca es requerido',
            'formData.category_id.required' => 'La categoria es requerido',
            'formData.subcategory_id.required' => 'La sub-categoria es requerido',
            'stock.required' => 'Las unidades son requeridas',
        ]);

        Product::create([
            'name' => $this->formData['name'],
            'description' => $this->formData['description'],
            'price' => $this->price,
            'marca_id' => $this->formData['marca_id'],
            'category_id' => $this->formData['category_id'],
            'subcategory_id' => $this->formData['subcategory_id'],
            'stock' => $this->stock,
        ]);
        session()->flash('success', 'Producto Guardado Correctamente');
        $this->NuevoProducto();
    }

    function edit($id)
    {
        $products = Product::where('id', $id)
            ->first();


        $this->formData = [
            'name' => $products->name,
            'description' => $products->description,
            'marca_id' => $products->marca_id,
            'category_id' => $products->category_id,
            'subcategory_id' => $products->subcategory_id,
        ];
        $this->price = $products->price;
        $this->stock = $products->stock;
        $this->idProduct = $id;
        $this->EditarProducto();
    }

    function editar()
    {
        $this->validate([
            'formData.name' => 'required',
            'formData.description' => 'required',
            'price' => 'required',
            'formData.marca_id' => 'required',
            'formData.category_id' => 'required',
            'formData.subcategory_id' => 'required',
            'stock' => 'required',
        ], [
            'formData.name.required' => 'El nombre es requerido',
            'formData.description.required' => 'La descripcion es requerido',
            'price.required' => 'El precio es requerido',
            'formData.marca_id.required' => 'La marca es requerido',
            'formData.category_id.required' => 'La categoria es requerido',
            'formData.subcategory_id.required' => 'La sub-categoria es requerido',
            'stock.required' => 'Las unidades son requeridas',
        ]);
        $products = Product::where('id', $this->idProduct)
            ->first();
        if ($products) {
            $products->update([
                'name' => $this->formData['name'],
                'description' => $this->formData['description'],
                'price' => $this->price,
                'marca_id' => $this->formData['marca_id'],
                'category_id' => $this->formData['category_id'],
                'subcategory_id' => $this->formData['subcategory_id'],
                'stock' => $this->stock,
            ]);
        } else {
            // Manejo del caso en que no se encuentra el producto
            // Puede ser lanzar un error o devolver una respuesta que indique que no se encontró el producto
        }
        $this->EditarProducto();
        $this->resetForm();

        session()->flash('success', 'Producto Editado Correctamente');

        $this->idProduct = '';
    }

    function delete($id)
    {

        $products = Product::where('id', $id)
            ->first();

        $products->delete();
        session()->flash('success', 'Producto Eliminado Correctamente');
    }


    //STOCK
    function desincrementrar($id)
    {

        $producto = Product::find($id);

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

    function incrementar($id)
    {

        $producto = Product::find($id);

        if ($producto) {
            // Incrementar el stock en 1
            $producto->stock += 1;
            // Guardar los cambios en la base de datos
            $producto->save();
        }
    }
}
