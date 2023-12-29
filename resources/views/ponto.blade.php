@extends('master')

@section('title', 'Ponto')

@section('content')
<!--
<link rel="stylesheet" href="{{ asset('css/pontoStyle.css') }}">
<div class="container">
    <h2 class="heading">
        <a href="#" id="pontoButton">Bater Ponto<span class="check-icon"><i class="fas fa-check"></i></span></a>
    </h2>
    <p class="user-info" id="userInfo">{{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}" class="logout-link">Log out</a></p>
    <p class="message">Ponto realizado</p>
    <div class="second-click-time center-text" id="secondClickTime"></div>
</div>

<script src="{{ asset('js/ponto.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
-->

<h2>Bater ponto</h2>
{{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}">Log out</a>

@endsection