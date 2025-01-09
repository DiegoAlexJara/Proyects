<?php

namespace App\Http\Middleware\Comic;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class CheckComicAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('comics_ShowLogin')->withErrors('Por favor, inicia sesión.');
        }

        $currentProjectId = 1;
        if (!Auth::user()->projects()->where('projects.id', $currentProjectId)->exists()) {
            return error(404);
        }

        return $next($request);
    }
}
