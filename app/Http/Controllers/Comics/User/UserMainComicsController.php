<?php

namespace App\Http\Controllers\Comics\User;

use App\Http\Controllers\Controller;
use App\Models\Comics\Category;
use App\Models\Comics\Marca;
use App\Models\Comics\SubCategory;
use Illuminate\Http\Request;

class UserMainComicsController extends Controller
{
    public function inicio()
    {
        return view('comics.Main_views.user.inicio');
    }

    public function Categorias()
    {
        return view('comics.Main_views.user.category.view-category');
    }

    public function CategoriasProducts($category)
    {
        $categorias = Category::where('name', $category)->first();
        $color = $categorias->color;
        return view('comics.Main_views.user.category.products-category', compact('category', 'color'));
    }

    public function Marcas()
    {
        return view('comics.Main_views.user.marcas.view-marca');
    }
    public function MarcasProducts($category)
    {
        $categorias = Marca::where('name', $category)->first();
        $color = $categorias->color;
        $path = $categorias->path;
        return view('comics.Main_views.user.marcas.products-marcas', compact('category', 'color', 'path'));
    }
    public function SubCategorias()
    {
        return view('comics.Main_views.user.sub_category.view-category');
    }

    public function SubCategoriasProducts($category)
    {
        $categorias = SubCategory::where('name', $category)->first();
        $color = $categorias->color;
        return view('comics.Main_views.user.sub_category.products-category', compact('category', 'color'));
    }

    public function comment()
    {
        return view('comics.Main_views.user.contactos');
    }

    public function carrito()
    {
        return view('comics.Main_views.user.carrito');
    }
}
