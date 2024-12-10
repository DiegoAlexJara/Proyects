<?php

namespace App\Http\Controllers\Comics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainComicsController extends Controller
{
    public function inicio() {
        return view('comics.Main_views.user.inicio');
    }
}
