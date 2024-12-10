<?php

namespace App\Http\Controllers\Postify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPostifyController extends Controller
{
    public function Create()
    {
        return view('postify.auth.newUser');
    }
    public function Store(Request $request) {}
}
