@extends('master')

@section('title', 'Ponto')

@section('content')

<h2>Bater ponto</h2>
{{ auth()->user()->name }} | <a href="{{ route('login.destroy') }}">Log out</a>



@endsection