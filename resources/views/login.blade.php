@extends('layouts.app')

@section('content')
    <main class="flex items-center flex-col gap-2 p-2">
        <h2 class="text-xl font-bold">Login para Administradores</h2>
        <p class="py-2 px-4 rounded-xl font-semibold bg-bg-light">Página apenas para Administradores do evento</p>
        <section class="max-w-xl w-full border-4 border-border rounded-xl overflow-hidden p-4 flex flex-col gap-4">
            <form class="flex flex-col gap-8" method="POST" action="{{ route('auth') }}">
                <p class="text-lg font-bold text-center">Caso seja um Administrador, entre com o nome de usuário e senha fornecidos para você</p>
                <section class="flex flex-col gap-2">
                    @csrf
                    <p>Nome de usuário</p>
                    <input
                        class="block focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                        type="email"
                        name="email"
                        placeholder="Usuário"
                        required
                    >
                </section>
                <section class="flex flex-col gap-2">
                    <p>Senha</p>
                    <input
                        type="password"
                        name="password"
                        placeholder="Senha"
                        required
                        class="block focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                    >
                </section>
                @if (session('status'))
                    <span class="text-warning text-center font-bold">{{ session('status') }}</span>
                @endif
                <section class="flex flex-col items-center justify-center gap-4">
                    <button type="submit" class="w-[40%] flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-highlight hover:bg-highlight-hover cursor-pointer">
                        Logar
                        <img src="{{ asset('svgs/log-in.svg') }}" alt="">
                    </button>
                    <a href="/" class="w-[40%] flex justify-center gap-2 text-center py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
                        Voltar
                        <img src="{{ asset('svgs/undo.svg') }}" alt="">
                    </a>
                </section>
            </form>
        </section>
        <a href="/" class="bottom-12 left-(middle-position) md:bottom-12 md:left-12 absolute flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
            Voltar para o placar
            <img src="{{ asset('svgs/undo.svg') }}" alt="">
        </a>
    </main>
@endsection
