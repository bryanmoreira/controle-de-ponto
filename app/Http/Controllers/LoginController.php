<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'cpf' => 'required|min:11|max:11',
            'password' => 'required'
        ], [
            'cpf' => 'O CPF deve ter 11 dígitos.',
            'password' => 'Senha inválida.'
        ]);

        $credentials = $request->only('cpf', 'password');

        $authenticated = Auth::attempt($credentials);

        if(!$authenticated) {
            return redirect()->route('login.index')->withErrors(['error' => 'CPF ou senha inválidos.']);
        }

        if(Auth::user()->admin) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('ponto.index');
    }

    public function destroy() 
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
