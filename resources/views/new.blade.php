@extends('layouts.app')

@section('content')
    <main class="flex items-center flex-col gap-2 p-2">
        <h2 class="text-xl font-bold">Formulário de Adição</h2>
        <p class="py-2 px-4 rounded-xl font-semibold bg-highlight">Adicione um participante</p>
        <form class="max-w-xl w-full border-4 border-border rounded-xl overflow-hidden p-4 flex flex-col gap-8" method="POST" action="{{ route('addPerson') }}">
            @csrf
            <section class="flex flex-col gap-2">
                <p>Nome do integrante</p>
                <input
                    class="block focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                    type="text"
                    name="name"
                    placeholder="Nome"
                    required
                >
            </section>
            <section class="flex flex-col gap-2">
                <p>Numeração da equipe / rodada</p>
                <section class="flex items-center gap-2">
                    <span>Rodada</span>
                    <input
                        class="grow focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                        type="number"
                        name="round"
                        placeholder="Numeração"
                        required
                    >
                </section>
            </section>
            <section class="flex flex-col gap-2">
                <p>Pontuação do integrante</p>
                <input
                    class="block focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                    type="number"
                    name="score"
                    placeholder="Pontuação"
                    required
                >
            </section>
            <section class="flex flex-col items-center justify-center gap-4">
                <a href="/" class="w-[40%] flex justify-center gap-2 text-center py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
                    Voltar
                    <img src="{{ asset('svgs/undo.svg') }}" alt="">
                </a>
                <button type="reset" class="w-[40%] flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-warning hover:bg-warning-hover cursor-pointer">
                    Limpar
                    <img src="{{ asset('svgs/eraser.svg') }}" alt="">
                </button>
                <button type="submit" class="w-[40%] flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-highlight hover:bg-highlight-hover cursor-pointer">
                    Adiconar
                    <img src="{{ asset('svgs/plus.svg') }}" alt="">
                </button>
            </section>
        </form>
        <a href="/" class="bottom-12 left-(middle-position) md:bottom-12 md:left-12 absolute flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
            Voltar para o placar
            <img src="{{ asset('svgs/undo.svg') }}" alt="">
        </a>
    </main>
@endsection
