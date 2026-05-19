<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 py-10">

        <div class="max-w-7xl mx-auto px-6">

            <!-- TOPO -->
            <div class="flex justify-between items-center mb-10">

                <div>

                    <h1 class="text-3xl font-bold text-white">
                        Painel do Professor
                    </h1>

                    <p class="text-blue-200 mt-2">
                        Controle de saída dos alunos
                    </p>

                </div>

            </div>

            <!-- ALERTA -->
            @if(session('success'))

                <div class="bg-green-500 text-white p-4 rounded-2xl mb-6">

                    {{ session('success') }}

                </div>

            @endif

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- TOTAL -->
                <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-6">

                    <h2 class="text-blue-200">
                        Total
                    </h2>

                    <p class="text-3xl font-bold text-white mt-3">

                        {{ $autorizacoes->count() }}

                    </p>

                </div>

                <!-- SAIU -->
                <div class="bg-green-500/20 backdrop-blur-lg border border-green-300/20 rounded-3xl p-6">

                    <h2 class="text-green-200">
                        Saíram da Sala
                    </h2>

                    <p class="text-3xl font-bold text-white mt-3">

                        {{ $autorizacoes->where('status', 'Saiu da Sala')->count() }}

                    </p>

                </div>

                <!-- SAÍDAS -->
                <div class="bg-red-500/20 backdrop-blur-lg border border-red-300/20 rounded-3xl p-6">

                    <h2 class="text-red-200">
                        Saídas
                    </h2>

                    <p class="text-3xl font-bold text-white mt-3">

                        {{ $autorizacoes->where('tipo', 'saida')->count() }}

                    </p>

                </div>

            </div>

            <!-- TABELA -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl overflow-hidden">

                <div class="p-6 border-b border-white/10">

                    <h2 class="text-xl font-bold text-white">
                        Autorizações
                    </h2>

                </div>

                <table class="w-full text-sm text-white">

                    <thead class="bg-white/10">

                        <tr>

                            <th class="p-4 text-left">
                                Aluno
                            </th>

                            <th class="p-4 text-left">
                                Turma
                            </th>

                            <th class="p-4 text-left">
                                Professor
                            </th>

                            <th class="p-4 text-left">
                                Tipo
                            </th>

                            <th class="p-4 text-left">
                                Horário
                            </th>

                            <th class="p-4 text-left">
                                Status
                            </th>

                            <th class="p-4 text-left">
                                Ação
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($autorizacoes as $autorizacao)

                            <tr class="border-t border-white/10 hover:bg-white/5 transition">

                                <td class="p-4">

                                    {{ $autorizacao->aluno }}

                                </td>

                                <td class="p-4">

                                    {{ $autorizacao->turma }}

                                </td>

                                <td class="p-4">

                                    {{ $autorizacao->professor }}

                                </td>

                                <td class="p-4">

                                    @if($autorizacao->tipo == 'saida')

                                        <span class="bg-red-500/20 text-red-200 px-3 py-1 rounded-full">

                                            Saída

                                        </span>

                                    @else

                                        <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full">

                                            Entrada

                                        </span>

                                    @endif

                                </td>

                                <td class="p-4">

                                    {{ $autorizacao->horario }}

                                </td>

                                <td class="p-4">

                                    @if($autorizacao->status == 'Saiu da Sala')

                                        <span class="text-green-300 font-bold">

                                            Saiu da Sala

                                        </span>

                                    @else

                                        <span class="text-yellow-300">

                                            Pendente

                                        </span>

                                    @endif

                                </td>

                                <td class="p-4">

                                    @if($autorizacao->status == 'Liberado')
                                <form action="{{ route('liberar', $autorizacao->id) }}" method="POST">

                                    @csrf

                                        <button
        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-xl transition">

        Liberar Aluno

    </button>

</form>

                                    @else

                                        <span class="text-green-300 font-bold">

                                            Confirmado

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center p-10 text-gray-300">

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