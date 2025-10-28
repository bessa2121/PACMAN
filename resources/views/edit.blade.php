@extends('layouts.app')

@section('content')
    <main class="flex items-center flex-col gap-2 p-2">
        <h2 class="text-xl font-bold">Formulário de Edição</h2>
        <p class="py-2 px-4 rounded-xl font-semibold bg-highlight">Edite informações do participante</p>
        <section class="max-w-xl w-full border-4 border-border rounded-xl overflow-hidden p-4 flex flex-col gap-4">
            <form class="flex flex-col gap-8" method="POST" action="{{ route('confirmEdit', $participante->id) }}">
                @csrf
                @method('PUT')
                <section class="flex flex-col gap-2">
                    <p>Nome do integrante</p>
                    <input
                        class="block focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                        type="text"
                        name="name"
                        value="{{ old('name', $participante->name) }}"
                        placeholder="Nome"
                        required
                    >
                </section>
                <section class="flex flex-col gap-2">
                    <p>Numeração da rodada</p>
                    <section class="flex items-center gap-2">
                        <span class="text-lg">Rodada</span>
                        <input
                            class="grow focus:outline-2 focus:outline-offset-2 focus:outline-highlight bg-bg-light rounded-xl p-2"
                            type="number"
                            name="round"
                            value="{{ old('name', $participante->round) }}"
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
                        value="{{ old('name', $participante->score) }}"
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
                        Formatar
                        <img src="{{ asset('svgs/eraser.svg') }}" alt="">
                    </button>
                    <button type="submit" class="w-[40%] flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-highlight hover:bg-highlight-hover cursor-pointer">
                        Confirmar
                        <img src="{{ asset('svgs/check.svg') }}" alt="">
                    </button>
                </section>
            </form>
            @if ($errors->any())
                <div class="text-red-400">
                    <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form class="flex flex-col gap-8" action="{{ route('deletePerson', $participante->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <section class="flex flex-col items-center justify-center gap-4">
                    <button type="submit" class="w-[40%] flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-warning hover:bg-warning-hover cursor-pointer">
                        Excluir
                        <img src="{{ asset('svgs/trash.svg') }}" alt="">
                    </button>
                </section>
            </form>
        </section>
        <a href="/" class="bottom-12 left-(middle-position) md:bottom-12 md:left-12 absolute flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
            Voltar para o placar
            <img src="{{ asset('svgs/undo.svg') }}" alt="">
        </a>
    </main>
@endsection
