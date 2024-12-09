<?php

namespace App\Http\Controllers\Finanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFinanzaController extends Controller
{
    public function Create()
    {
        return view('finanzas.auth.newUser');
    }
    public function Store(Request $request)
    {
           
    }
}
