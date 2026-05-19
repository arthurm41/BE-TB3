<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 py-10">

        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-10">

                <h1 class="text-3xl font-bold text-white">
                    Painel da Portaria
                </h1>

                <p class="text-gray-300 mt-2">
                    Alunos liberados para saída
                </p>

            </div>

            @if(session('success'))

                <div class="bg-green-500 text-white p-4 rounded-2xl mb-6">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl overflow-hidden">

                <table class="w-full text-white">

                    <thead class="bg-white/10">

                        <tr>

                            <th class="p-4 text-left">Aluno</th>

                            <th class="p-4 text-left">Turma</th>

                            <th class="p-4 text-left">Professor</th>

                            <th class="p-4 text-left">Horário</th>

                            <th class="p-4 text-left">Tipo</th>

                            <th class="p-4 text-left">Ação</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($autorizacoes as $autorizacao)

                            <tr class="border-t border-white/10">

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
                                    {{ $autorizacao->horario }}
                                </td>

                                <td class="p-4">
                                    {{ $autorizacao->tipo }}
                                </td>

                                <td class="p-4">

                                    <form action="{{ route('validar', $autorizacao->id) }}" method="POST">

                                        @csrf

                                        <button
                                            class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl">

                                            Validar Saída

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center p-10 text-gray-300">

                                    Nenhum aluno liberado.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>