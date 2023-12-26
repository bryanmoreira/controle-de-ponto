<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PontoController extends Controller
{
    public function index() {
        return view('ponto');
    }
}
