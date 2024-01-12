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
            ->value('updated_at');

        $todosPontosBatidos = $this->verificarTodosPontosBatidos($user);

        $hora = $ultimoPonto ? $ultimoPonto->format('H:i:s d/m/Y') : "Nenhum registro";

        if ($todosPontosBatidos) {
            $mensagem = "Todos os pontos já foram batidos";
            return view('ponto')->with('mensagem', $mensagem)->with('hora', $hora);
        }
        $mensagem = "";

        return view('ponto')->with('hora', $hora)->with('mensagem', $mensagem);
    }

    private function verificarTodosPontosBatidos($user)
    {
        $pontoHoje = Ponto::where('user_id', $user)
            ->whereDate('created_at', now()->toDateString())
            ->first();

        return $pontoHoje && $pontoHoje->inicio_expediente && $pontoHoje->inicio_almoco &&
            $pontoHoje->final_almoco && $pontoHoje->final_expediente;
    }

    public function criarOuAtualizarPonto($user)
    {
        $hoje = new \DateTimeImmutable();
        $dataHoje = $hoje->format('Y-m-d');

        $pontoExistente = Ponto::where('user_id', $user->id)
            ->where('data', $dataHoje)
            ->first();

        if ($pontoExistente) {
            $camposExistentes = array_filter($pontoExistente->toArray());

            $proximoCampo = $this->determinarProximoCampo($camposExistentes);

            $pontoExistente->update([
                $proximoCampo => $hoje->format('Y-m-d H:i:s'),
            ]);
        } else {
            $this->criaPrimeiroRegistroDoDia($user, $dataHoje);
        }
    }

    private function criaPrimeiroRegistroDoDia($user, $dataHoje)
    {
        $hoje = new \DateTimeImmutable();
        $dataHoje = $hoje->format('Y-m-d');

        return Ponto::create([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'cpf' => $user->cpf,
            'data' => $dataHoje,
            'inicio_expediente' => $hoje->format('Y-m-d H:i:s'),
        ]);
    }

    private function determinarProximoCampo($camposExistentes)
    {
        $camposPossiveis = ['inicio_expediente', 'inicio_almoco', 'final_almoco', 'final_expediente'];

        foreach ($camposPossiveis as $campo) {
            if (!isset($camposExistentes[$campo])) {
                return $campo;
            }
        }

        return null;
    }


    public function store()
    {
        $user = Auth::user();

        $this->criarOuAtualizarPonto($user);

        return redirect()->route('ponto.index');
    }
}
