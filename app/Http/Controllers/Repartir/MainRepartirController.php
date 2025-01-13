<?php

namespace App\Http\Controllers\Repartir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainRepartirController extends Controller
{
    public function inicio(){
        return view('repartir.index');
    }
}
