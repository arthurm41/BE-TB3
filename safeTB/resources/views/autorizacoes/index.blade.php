<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 py-10">

        <div class="max-w-7xl mx-auto px-6">

            <!-- TOPO -->
            <div class="flex justify-between items-center mb-10">

                <div>

                    <h1 class="text-3xl font-extrabold text-white tracking-wide">
                        SAFE
                    </h1>

                    <p class="text-blue-200 mt-3 text-lg">
                        Sistema de Autorização e Fluxo Escolar
                    </p>

                </div>

                @if(
                    Auth::user()->role != 'professor' &&
                    Auth::user()->role != 'portaria'
                )

                    <a href="{{ route('autorizacoes.create') }}"
                       class="bg-white text-blue-900 hover:bg-blue-100 px-6 py-3 rounded-2xl shadow-lg font-bold transition">

                        + Nova Autorização

                    </a>

                @endif

            </div>

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

                <!-- TOTAL -->
                <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-xl p-6">

                    <h2 class="text-blue-200 font-semibold text-lg">
                        Total de Autorizações
                    </h2>

                    <p class="text-3xl font-extrabold text-white mt-4">
                        {{ $autorizacoes->count() }}
                    </p>

                </div>

                <!-- LIBERADOS -->
                <div class="bg-green-500/20 backdrop-blur-lg border border-green-300/20 rounded-3xl shadow-xl p-6">

                    <h2 class="text-green-200 font-semibold text-lg">
                        Liberados
                    </h2>

                    <p class="text-3xl font-extrabold text-white mt-4">
                        {{ $autorizacoes->where('status', 'Liberado')->count() }}
                    </p>

                </div>

                <!-- SAÍDAS -->
                <div class="bg-red-500/20 backdrop-blur-lg border border-red-300/20 rounded-3xl shadow-xl p-6">

                    <h2 class="text-red-200 font-semibold text-lg">
                        Saídas
                    </h2>

                    <p class="text-3xl font-extrabold text-white mt-4">
                        {{ $autorizacoes->where('tipo', 'saida')->count() }}
                    </p>

                </div>

                <!-- ENTRADAS -->
                <div class="bg-blue-500/20 backdrop-blur-lg border border-blue-300/20 rounded-3xl shadow-xl p-6">

                    <h2 class="text-blue-200 font-semibold text-lg">
                        Entradas
                    </h2>

                    <p class="text-3xl font-extrabold text-white mt-4">
                        {{ $autorizacoes->where('tipo', 'entrada')->count() }}
                    </p>

                </div>

            </div>

            <!-- TABELA -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl overflow-hidden">

                <div class="p-6 border-b border-white/10">

                    <h2 class="text-2xl font-bold text-white">
                        Lista de Autorizações
                    </h2>

                </div>

                <table class="w-full text-sm">

                    <thead class="bg-white/10 text-white text-sm">

                        <tr>

                            <th class="p-4 text-left">Aluno</th>

                            <th class="p-4 text-left">Turma</th>

                            <th class="p-4 text-left">Professor</th>

                            <th class="p-4 text-left">Tipo</th>

                            <th class="p-4 text-left">Horário</th>

                            <th class="p-4 text-left">Aula</th>

                            <th class="p-4 text-left">Falta</th>

                            <th class="p-4 text-left">Status</th>

                            <th class="p-4 text-left">Ação</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($autorizacoes as $autorizacao)

                            <tr class="border-t border-white/10 hover:bg-white/5 text-white transition">

                                <!-- ALUNO -->
                                <td class="p-4 font-semibold">
                                    {{ $autorizacao->aluno }}
                                </td>

                                <!-- TURMA -->
                                <td class="p-4">
                                    {{ $autorizacao->turma }}
                                </td>

                                <!-- PROFESSOR -->
                                <td class="p-4">
                                    {{ $autorizacao->professor }}
                                </td>

                                <!-- TIPO -->
                                <td class="p-4">

                                    @if($autorizacao->tipo == 'saida')

                                        <span class="bg-red-500/20 text-red-200 px-3 py-1 rounded-full text-sm">
                                            Saída
                                        </span>

                                    @else

                                        <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm">
                                            Entrada
                                        </span>

                                    @endif

                                </td>

                                <!-- HORÁRIO -->
                                <td class="p-4">
                                    {{ $autorizacao->horario }}
                                </td>

                                <!-- AULA -->
                                <td class="p-4">
                                    {{ $autorizacao->aula }}
                                </td>

                                <!-- FALTA -->
                                <td class="p-4">

                                    @if($autorizacao->falta == 'com_falta')

                                        <span class="text-red-300 font-semibold">
                                            Com falta
                                        </span>

                                    @else

                                        <span class="text-green-300 font-semibold">
                                            Sem falta
                                        </span>

                                    @endif

                                </td>

                                <!-- STATUS -->
                                <td class="p-4">

                                    @if($autorizacao->status == 'Pendente')

                                        <span class="bg-yellow-500/20 text-yellow-200 px-3 py-1 rounded-full text-sm">

                                            Pendente

                                        </span>

                                    @elseif($autorizacao->status == 'Liberado')

                                        <span class="bg-green-500/20 text-green-200 px-3 py-1 rounded-full text-sm">

                                            Liberado pelo Professor

                                        </span>

                                    @elseif($autorizacao->status == 'Validado na Portaria')

                                        <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm">

                                            Validado na Portaria

                                        </span>

                                    @endif

                                </td>

                                <!-- AÇÕES -->
                                <td class="p-4">

                                    <!-- PROFESSOR -->
                                    @if(Auth::user()->role == 'professor')

                                        @if($autorizacao->status == 'Pendente')

                                            <form action="{{ route('liberar', $autorizacao->id) }}" method="POST">

                                                @csrf

                                                <button
                                                    class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-xl text-white transition">

                                                    Liberar

                                                </button>

                                            </form>

                                        @else

                                            <span class="text-green-300 font-bold">
                                                ✔
                                            </span>

                                        @endif

                                    <!-- PORTARIA -->
                                    @elseif(Auth::user()->role == 'portaria')

                                        @if($autorizacao->status == 'Liberado')

                                            <form action="{{ route('validar', $autorizacao->id) }}" method="POST">

                                                @csrf

                                                <button
                                                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl text-white transition">

                                                    Validar

                                                </button>

                                            </form>

                                        @elseif($autorizacao->status == 'Validado na Portaria')

                                            <span class="text-blue-300 font-bold">
                                                ✔ Validado
                                            </span>

                                        @else

                                            <span class="text-gray-400">
                                                Aguardando Professor
                                            </span>

                                        @endif

                                    <!-- ADMIN -->
                                    @else

                                        <span class="text-gray-300">
                                            ---
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="text-center p-10 text-gray-300">

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