<?php

namespace App\Http\Controllers\Finanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainFinanzaController extends Controller
{
    public function index()
    {
        return view('finanzas.Main_Views.index');
    }
    public function report()
    {
        return view('finanzas.Main_Views.report');
    }
}
