<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Support\Facades\Auth;

class PontoController extends Controller
{
    public function index() 
    {
        $user = Auth::id();
        
        $ultimoPonto = Ponto::where('user_id', $user)
            ->orderBy('created_at', 'desc')
            ->value('created_at');

        if($ultimoPonto) {
            $ultimoPonto = $ultimoPonto->format('H:i:s');
        }
        
        return view('ponto')->with('hora', $ultimoPonto);
    }

    public function store()
    {
        $user = Auth::user();

        Ponto::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
        ]);

        return redirect()->route('ponto.index');
    }
}
