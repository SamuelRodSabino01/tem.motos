<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processar o login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard'); // Redireciona para a página desejada
        }

        return redirect()->back()->withErrors(['email' => 'As credenciais não correspondem aos nossos registros.']);
    }

    // Exibir o formulário de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Processar o registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Logout do sistema
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
