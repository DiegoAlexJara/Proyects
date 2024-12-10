<?php

namespace App\Http\Controllers\Postify;

use App\Http\Controllers\Controller;
use App\Models\Postify\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPostifyController extends Controller
{
    public function Index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('postify.main_Views.index');
    }
    public function Inicio() // (string $name)
    {
        $name = Auth::user()->name;
        $user = User::where('name', $name)->first();

        if ($user) {
            $userId = $user->id;
            return view('postify.main_Views.visit', compact('userId', 'name'));
        } else {
            // Manejar el caso en que no se encuentra el usuario
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los proyectos del usuario autenticado que coincidan con el ID del proyecto
        $projects = $user->projects()->where('projects.id', 2)->get();

        // Buscar usuarios que coincidan con el query
        $users = User::where('name', 'like', "%$query%")->get();

        // Combinar ambas colecciones
        $users = $projects->merge($users);

        return view('postify.main_Views.search', compact('users', 'query'));
    }

    public function visit(String $name)
    {

        $user = User::where('name', $name)->first();

        if ($user) {
            $userId = $user->id;
            return view('postify.main_Views.visit', compact('userId', 'name'));
        } else {
            // Manejar el caso en que no se encuentra el usuario
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }
    }
}
