@extends('layouts.app')

@section('content')
    <main class="flex items-center flex-col gap-2 p-2">
        <h2 class="text-xl font-bold">Placar</h2>
        <p class="py-2 px-4 rounded-xl font-semibold bg-neutral">O placar lista apenas o melhor integrante da rodada</p>
        <section class="max-w-6xl border-4 border-border rounded-xl overflow-hidden">
            <table class="w-full table-fixed text-center [&_td]:p-2 [&_th]:p-2">
                <thead>
                    <tr class="odd:bg-highlight [&_tr]:nth-3:hidden">
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Rodada</th>
                        <th>Pontuação</th>
                    </tr>
                </thead>
                <tbody class="[&_tr]:even:bg-neutral [&_tr]:odd:bg-bg">
                    @forelse ($participantes as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ route('editPerson', $p->id) }}" class="hover:underline decoration-border decoration-2">
                                    {{ $p->name }}
                                </a>
                            </td>
                            <td>{{ $p->round }}</td>
                            <td>{{ $p->score }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhum participante encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        @if (Auth::guard('admin')->check())
            <section class="flex flex-col justify-center gap-2 text-center">
                <p class="py-2 px-4 rounded-xl font-semibold bg-neutral">Clique no nome do participante para editar as informações</p>
                @if (session('success'))
                    <p class="flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-success hover:bg-success-hover cursor-pointer" id="success-msg">
                        {{ session('success') }}
                        <img src="{{ asset('svgs/eye-off.svg') }}" alt="">
                    </p>
                @endif
                <a href="/new" class="flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-contrast hover:bg-contrast-hover cursor-pointer">
                    Adicionar participante
                    <img src="{{ asset('svgs/plus.svg') }}" alt="">
                </a>
                <form method="POST" action="{{ route('logout') }}" class="bottom-12 left-(middle-position) md:bottom-12 md:left-12 absolute">
                    @csrf
                    <button class="flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-warning hover:bg-warning-hover cursor-pointer">
                        Deslogar
                        <img src="{{ asset('svgs/log-out.svg') }}" alt="">
                    </button>
                </form>
            </section>
        @else
            <a href="/login" class="bottom-12 left-(middle-position) md:bottom-12 md:left-12 absolute flex justify-center gap-2 py-2 px-4 rounded-xl font-semibold bg-neutral hover:bg-neutral-hover cursor-pointer">
                Login para Admins
                <img src="{{ asset('svgs/log-in.svg') }}" alt="">
            </a>
        @endif
    </main>
@endsection

@push('scripts')
    <script>
        const successMsg = document.getElementById('success-msg');

        successMsg.addEventListener('click', () => {
            successMsg.classList.toggle('hidden')
        })
    </script>
@endpush
