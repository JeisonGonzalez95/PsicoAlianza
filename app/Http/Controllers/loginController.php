<?php

namespace App\Http\Controllers;

use App\Models\users_app;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            session(['name' => $user->name, 'lastname' => $user->lastname]);
            return redirect()->route('index');
        }

        return redirect()->route('app')->with('alerta', [
            'titulo' => '¡Error!',
            'mensaje' => 'Usuario o contraseña incorrectos, intente nuevamente.',
            'icono' => 'error',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }

    public function logoutUser(Request $request)
    {
        auth()->guard('web')->logout();
        session()->forget(['name', 'lastname']);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('app')->with('alerta', [
            'titulo' => '',
            'mensaje' => 'Gracias por visitarnos.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }


    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'dni' => 'required|numeric|unique:users_app,dni',
            'correo' => 'required|email|unique:users_app,email',
            'contraseña' => 'required|min:6|confirmed',
        ]);

        $usuario = new users_app();
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->dni = $request->dni;
        $usuario->email = $request->correo;
        $usuario->username = $request->correo;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->remember_token = $request->_token;
        $usuario->save();

        return redirect()->route('app')->with('alerta', [
            'titulo' => '¡Éxito!',
            'mensaje' => 'Usuario creado correctamente.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }
}
