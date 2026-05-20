<x-app-layout>

    <div class="min-h-screen bg-[#0f172a] py-10 px-6">

        <div class="max-w-7xl mx-auto">

            <!-- TOPO -->
            <div class="flex justify-between items-center mb-10">

                <div>

                    <h1 class="text-5xl font-black text-white tracking-wide">
                        SAFE
                    </h1>

                    <p class="text-slate-400 mt-3 text-lg">
                        Sistema de Autorização e Fluxo Escolar
                    </p>

                </div>

                @if(Auth::user()->role == 'admin')

                    <a href="{{ route('autorizacoes.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 transition px-7 py-4 rounded-2xl text-white font-bold shadow-2xl">

                        + Nova Autorização

                    </a>

                @endif

            </div>

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

                <div class="bg-[#1e293b] border border-slate-700 rounded-3xl p-7 shadow-2xl">

                    <h2 class="text-slate-400 text-sm uppercase tracking-widest">
                        Total
                    </h2>

                    <p class="text-4xl font-black text-white mt-4">
                        {{ $autorizacoes->count() }}
                    </p>

                </div>

                <div class="bg-green-600 rounded-3xl p-7 shadow-2xl">

                    <h2 class="text-green-100 text-sm uppercase tracking-widest">
                        Liberados
                    </h2>

                    <p class="text-4xl font-black text-white mt-4">
                        {{ $autorizacoes->where('status', 'Liberado')->count() }}
                    </p>

                </div>

                <div class="bg-red-600 rounded-3xl p-7 shadow-2xl">

                    <h2 class="text-red-100 text-sm uppercase tracking-widest">
                        Saídas
                    </h2>

                    <p class="text-4xl font-black text-white mt-4">
                        {{ $autorizacoes->where('tipo', 'saida')->count() }}
                    </p>

                </div>

                <div class="bg-blue-700 rounded-3xl p-7 shadow-2xl">

                    <h2 class="text-blue-100 text-sm uppercase tracking-widest">
                        Entradas
                    </h2>

                    <p class="text-4xl font-black text-white mt-4">
                        {{ $autorizacoes->where('tipo', 'entrada')->count() }}
                    </p>

                </div>

            </div>

            <!-- TABELA -->
            <div class="bg-[#1e293b] border border-slate-700 rounded-3xl overflow-hidden shadow-2xl">

                <div class="px-8 py-6 border-b border-slate-700">

                    <h2 class="text-2xl font-bold text-white">
                        Lista de Autorizações
                    </h2>

                </div>

                <table class="w-full">

                    <thead class="bg-[#0f172a]">

                        <tr class="text-slate-300 text-sm uppercase">

                            <th class="p-5 text-left">Aluno</th>

                            <th class="p-5 text-left">Turma</th>

                            <th class="p-5 text-left">Professor</th>

                            <th class="p-5 text-left">Tipo</th>

                            <th class="p-5 text-left">Horário</th>

                            <th class="p-5 text-left">Aula</th>

                            <th class="p-5 text-left">Falta</th>

                            <th class="p-5 text-left">Status</th>

                            @if(Auth::user()->role == 'professor')

                                <th class="p-5 text-left">
                                    Ação
                                </th>

                            @endif

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($autorizacoes as $autorizacao)

                            <tr class="border-t border-slate-700 hover:bg-slate-800 transition text-white">

                                <td class="p-5 font-semibold">
                                    {{ $autorizacao->aluno }}
                                </td>

                                <td class="p-5">
                                    {{ $autorizacao->turma }}
                                </td>

                                <td class="p-5">
                                    {{ $autorizacao->professor }}
                                </td>

                                <td class="p-5">

                                    @if($autorizacao->tipo == 'saida')

                                        <span class="bg-red-500/20 text-red-300 px-4 py-2 rounded-full text-xs font-bold">
                                            SAÍDA
                                        </span>

                                    @else

                                        <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-xs font-bold">
                                            ENTRADA
                                        </span>

                                    @endif

                                </td>

                                <td class="p-5">
                                    {{ $autorizacao->horario }}
                                </td>

                                <td class="p-5">
                                    {{ $autorizacao->aula }}
                                </td>

                                <td class="p-5">

                                    @if($autorizacao->falta == 'com_falta')

                                        <span class="text-red-400 font-bold">
                                            Com Falta
                                        </span>

                                    @else

                                        <span class="text-green-400 font-bold">
                                            Sem Falta
                                        </span>

                                    @endif

                                </td>

                                <td class="p-5">

                                    @if($autorizacao->status == 'Pendente')

                                        <span class="bg-yellow-500/20 text-yellow-300 px-4 py-2 rounded-full text-xs font-bold">
                                            PENDENTE
                                        </span>

                                    @elseif($autorizacao->status == 'Liberado')

                                        <span class="bg-green-500/20 text-green-300 px-4 py-2 rounded-full text-xs font-bold">
                                            LIBERADO
                                        </span>

                                    @else

                                        <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-xs font-bold">
                                            PORTARIA
                                        </span>

                                    @endif

                                </td>

                                @if(Auth::user()->role == 'professor')

                                    <td class="p-5">

                                        @if($autorizacao->status != 'Liberado')

                                            <form action="{{ route('liberar', $autorizacao->id) }}" method="POST">

                                                @csrf

                                                <button
                                                    class="bg-green-600 hover:bg-green-700 transition px-5 py-3 rounded-xl font-bold">

                                                    Liberar

                                                </button>

                                            </form>

                                        @else

                                            <span class="text-green-400 font-bold">
                                                Liberado
                                            </span>

                                        @endif

                                    </td>

                                @endif

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center text-slate-400 p-10">

                                    Nenhuma autorização encontrada.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>