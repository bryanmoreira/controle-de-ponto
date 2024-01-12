@extends('master')

@section('title', 'Login')

@section('content')


<div class="bg-gradient-to-r from-purple-800 via-violet-900 to-purple-800 flex items-center justify-center min-h-screen">
<form action="{{ route('login.store') }}" method="post" class="w-full max-w-md bg-gray-50 rounded-md px-8 py-8 mx-5">
    <h1 class="text-center text-2xl font-bold mb-2">Sign-in</h1>
<div class="mb-4">
    @csrf
    <label for="cpf" class="block text-gray-800 text-base font-bold mb-2 pb-2">CPF</label>
    <input type="text" name="cpf" value="12345678910" maxlength="11" minlength="11" placeholder="CPF" class="mb-1 shadow border rounded w-full py-2 px-3 text-gray-500 leading-snug focus:outline-none focus:shadow-outline placeholder:text-sm placeholder:font-semibold">
    @error('cpf')
        <span class="text-purple-500 italic text-sm">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-6">
    <label for="password" class="block text-gray-800 text-base font-bold mb-2 pb-2">SENHA</label>
    <input type="password" name="password" value="123" placeholder="SENHA" class="mb-1 shadow border rounded w-full py-2 px-3 text-gray-500 leading-snug focus:outline-none focus:shadow-outline placeholder:text-sm placeholder:font-semibold">
    @error('password')
        <span class="text-purple-500 italic text-sm">{{ $message }}</span>
    @enderror
    </div>
    <div class="flex justify-center">
    <button type="submit" class="bg-purple-500 hover:bg-purple-700 transition-all text-white font-bold py-3 px-7 rounded">Entrar</button>
    </div>

    @error('error')
    <h5 class="text-purple-500 italic text-sm text-center mt-2">{{ $message }}</h5>
    @enderror
</form>
</div>
@endsection
