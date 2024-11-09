<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginIn(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirigir al usuario a su página de inicio
            return redirect()->intended('/contabilidad')->with('success', '¡Bienvenido!');
        }

        // Redirigir de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
    public function loginOut(){
        Auth::logout();
        return redirect('/')->with('success', '¡Has cerrado sesión correctamente!');
    }
}
