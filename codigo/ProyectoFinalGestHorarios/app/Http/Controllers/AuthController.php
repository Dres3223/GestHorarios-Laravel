<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        User::where('email', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Alert::success('Completado', 'Inicio de sesion Hecho !');
            return redirect()->intended('/dashboard');
        } else {
            Alert::error('Error', 'Inicio de sesion Fallido !');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('auth.registro', [
            'title' => 'Register',
        ]);
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        Alert::success('Completado', 'El usuario ha sido registrado con exito !');
        return redirect('/register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Completado', 'Cerraste Sesion !');
        return redirect('/login');
    }
    public function destroy($id)
    {
        try {
            $usuario = User::find($id);
            if ($usuario) {
                $usuario->delete();
                return redirect()->back()->with("correcto", "Usuario eliminado correctamente");
            } else {
                return redirect()->back()->with("error", "No se encontró el usuario para eliminar");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Error al eliminar el usuario");
        }
    }
}