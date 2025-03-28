<?php

namespace App\Http\Controllers\Comics\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainComicsController extends Controller
{
    public function inicio()
    {
        return view('comics.Main_views.admin.inicio');
    }
    public function products()
    {
        return view('comics.Main_views.admin.products');
    }
    public function marcas()
    {
        return view('comics.Main_views.admin.marca');
    }
    public function categorias()
    {
        return view('comics.Main_views.admin.categorias');
    }
    public function subcategorias()
    {
        return view('comics.Main_views.admin.sub-categorias');
    }
}
