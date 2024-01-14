@extends('master')

@section('title', 'Login')

@section('content')


    <div class="bg-gradient-to-r from-purple-400 via-violet-500 to-purple-600 flex items-center justify-center min-h-screen">
        <div class="flex justify-center w-4/6">
            <div
                class="max-lg:hidden bg-gradient-to-bl from-purple-700 via-violet-900 to-purple-800 w-2/3 rounded-l-2xl shadow-2xl flex flex-col justify-center items-start px-16 py-36">
                <div class="flex flex-col gap-4">
                    <h1 class="text-5xl text-white font-bold">Seja bem-vindo de volta!</h1>
                    <h2 class="text-xl text-white font-thin">Entre com a sua conta para registrar seu ponto. </h2>

                </div>
            </div>

            <form action="{{ route('login.store') }}" method="post"
                class="flex flex-col bg-gray-50 rounded-r-2xl max-lg:rounded-l-2xl max-lg:px-5 max-lg:py-10 max-lg:w-[400px] px-16 py-36 w-2/4 shadow-2xl">
                <div class="flex items-center max-lg:justify-center ">
                    <h1 class="text-4xl font-bold mb-8 flex items-center">Sign-
                        <span
                            class="bg-gradient-to-bl from-purple-700 via-violet-900 to-purple-800 text-transparent bg-clip-text mr-2 ">in
                        </span>
                        <i
                            class='bx bxs-user-circle text-5xl bg-gradient-to-bl from-purple-700 via-violet-900 to-purple-800 text-transparent bg-clip-text'></i>
                    </h1>

                </div>
                <div>
                    <div class="mb-5">
                        @csrf
                        <label for="cpf" class="block text-gray-800 text-base font-bold mb-2 pb-2">CPF</label>
                        <div class="flex items-center justify-center mb-3">
                            <div
                                class="bg-white border-purple-500  text-purple-500 border-r-0 border-l border-t border-b rounded-l-full py-3 pl-3 leading-snug">
                                <i class='bx bx-user'></i>
                            </div>
                            <input type="text" name="cpf" value="12345678910" maxlength="14" minlength="11"
                                placeholder="000.000.000-00"
                                class="border-purple-500 border-r border-t border-b rounded-r-full w-full py-3 px-3 text-gray-500 leading-snug focus:outline-none focus:shadow-outline placeholder:text-sm placeholder:font-semibold">
                            @error('cpf')
                            </div>
                            <span class="text-purple-500 italic text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="mb-5">
                        <label for="password" class="block text-gray-800 text-base font-bold mb-2 pb-2">SENHA</label>
                        <div class="flex items-center justify-center mb-3">
                            <div
                                class="bg-white text-purple-500 border-purple-500 border-r-0 border-l border-t border-b rounded-l-full py-3 pl-3 leading-snug">
                                <i class='bx bx-lock-alt'></i>
                            </div>
                            <input type="password" name="password" value="123" placeholder="••••••••"
                                class="border-purple-500 border-r border-t border-b rounded-r-full w-full py-3 px-3 text-gray-500 leading-snug focus:outline-none focus:shadow-outline placeholder:text-sm placeholder:font-semibold">
                            @error('password')
                            </div>
                            <span class="text-purple-500 italic text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs gap-5 mb-5 text-gray-800 max-sm:text-[11px]">
                    <div class="flex items-center gap-2 hover:text-purple-500 transition-all delay-75">

                        <input type="checkbox" id="checkbox"
                            class="shrink-0 h-4 checked:bg-gradient-to-bl checked:from-purple-700 checked:via-violet-900 checked:to-purple-800 border rounded-sm border-purple-500 w-4 appearance-none cursor-pointer text-purple-600 focus:ring-purple-600">
                        <label for="checkbox" class="cursor-pointer ">Mantenha-me conectado</label>

                    </div>
                    <a href="" class="hover:text-purple-500 transition-all delay-75">Esqueceu sua senha?</a>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-gradient-to-bl from-purple-700 via-violet-900 to-purple-800 hover:from-purple-600 hover:via-violet-800 hover:to-purple-700   transition-all delay-75 text-white font-bold w-full py-4 px-7 rounded-full text-lg">Entrar</button>
                </div>

                @error('error')
                    <h5 class="text-purple-500 italic text-sm text-center mt-2">{{ $message }}</h5>
                @enderror
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="cpf"]').inputmask({
                mask: ['999.999.999-99'],
                keepStatic: true
            });
        });
    </script>

@endsection
