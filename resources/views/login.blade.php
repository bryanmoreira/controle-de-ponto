@extends('master')

@section('title', 'Login')

@section('content')

<h2>Login</h2>

@error('error')
    <span>{{ $message }}</span>
@enderror

<form action="{{ route('login.store') }}" method="post">
    @csrf

    <label for="cpf">CPF</label>
    <input type="number" name="cpf" value="12345678910">
    @error('cpf')
        <span>{{ $message }}</span>
    @enderror

    <label for="password">Senha</label>
    <input type="password" name="password" value="123">
    @error('password')
        <span>{{ $message }}</span>
    @enderror

    <button type="submit">Login</button>
</form>

@endsection