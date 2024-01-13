@extends('master')

@section('title', 'Ponto')

@section('content')

    @if ($hora)
        <h1>Último registro: {{ $hora }}</h1>
    @endif

    @if ($mensagem)
        <h1>{{ $mensagem }}</h1>
    @endif


    <link rel="stylesheet" href="{{ asset('css/pontoStyle.css') }}">
    <div class="container">
        <h2 class="heading">
            <a href="#" id="pontoButton">Iniciar expediente</a>
        </h2>
        <p class="user-info" id="userInfo">{{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}"
                class="logout-link">Log out</a></p>
        <p class="message"></p>
        <div class="second-click-time center-text" id="secondClickTime"></div>
        <p class="message"></p>
        <div class="second-click-time center-text" id="thirdClickTime"></div>
        <p class="message"></p>
        <div class="second-click-time center-text" id="fourthClickTime"></div>
    </div>
    <div class="container">
        <h2 class="heading">
            <form action="{{ route('ponto.store') }}" method="POST">
                @csrf
                <button type="submit">
                    Registrar ponto
                    <span class="check-icon">
                        <i class="fas fa-check"></i>
                    </span>
                </button>
            </form>
        </h2>
        <p class="user-info" id="userInfo">{{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}"
                class="logout-link">Log out</a></p>
        <p class="message">Ponto realizado</p>
        <div class="second-click-time center-text" id="secondClickTime"></div>
    </div>

    <script src="{{ asset('js/ponto.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


    <h2>Bater ponto</h2>
    {{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}">Log out</a>

@endsection
