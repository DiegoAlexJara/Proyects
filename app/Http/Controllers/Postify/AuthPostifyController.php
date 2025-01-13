<?php

namespace App\Http\Controllers\Postify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPostifyController extends Controller
{
    public function showLogin()
    {
        return view('postify.auth.showLogin');
    }

    public function loginIn(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $projectId = 2;
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            // Verificar si el usuario tiene acceso al proyecto
            if ($user->projects()->where('projects.id', $projectId)->exists()) {
                // Guardar proyecto en sesión
                session(['current_project' => $projectId]);
    
                // Redirigir a la página principal del proyecto
                return redirect()->route('postify_Inicio');
            }
    
            Auth::logout();
            return back()->withErrors(['project' => 'No tienes acceso a este proyecto.']);
        }
    
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function loginOut(Request $request)
    {
        // Elimina el usuario autenticado
        Auth::logout();

        // Opcional: Limpia la sesión del proyecto actual
        session()->forget('current_project');

        // Redirige al usuario después del cierre de sesión
        return redirect()->route('postify_ShowLogin')->with('status', 'Sesión cerrada correctamente.');
    }
    public function CreateUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => ['required', 'confirmed'],
        ]);

        $projectId  = 2;
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {

            $user = User::create($request->all());
            $user->Projects()->attach([$projectId]);
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            // Guardar proyecto en sesión
            session(['current_project' => $projectId]);

            // Redirigir a la página principal del proyecto
            return redirect()->route('comics_userInicio');
        }
        if ($user->Projects->contains($projectId)) {
            return redirect()->route('comics_userInicio');
        }
        $user->Projects()->attach($projectId);
        Auth::login($user);
        // Guardar proyecto en sesión
        session(['current_project' => $projectId]);

        // Redirigir a la página principal del proyecto
        return redirect()->route('comics_userInicio');
    }
}
