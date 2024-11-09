<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddlare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verifica si el usuario está autenticado
         if (!Auth::check()) {
            // Si no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('Login');
        }
        

        // Si está autenticado, permite el acceso
        return $next($request);

    }
}
