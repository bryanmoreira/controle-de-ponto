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
    <input type="text" name="cpf" value="98765432101" maxlength="11" minlength="11">
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