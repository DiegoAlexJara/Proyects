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
}
