<x-app-layout>

    <div class="min-h-screen bg-[#0f172a] py-12 px-6">

        <div class="max-w-4xl mx-auto">

            <div class="bg-[#1e293b] border border-slate-700 rounded-3xl shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="bg-blue-700 px-10 py-8">

                    <h1 class="text-4xl font-black text-white">
                        Nova Autorização
                    </h1>

                    <p class="text-blue-100 mt-2">
                        Registro oficial de liberação escolar
                    </p>

                </div>

                <!-- FORM -->
                <div class="p-10">

                    <form action="{{ route('autorizacoes.store') }}" method="POST">

                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- PROFESSOR -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Professor
                                </label>

                                <input
                                    type="text"
                                    name="professor"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Nome do professor">

                            </div>

                            <!-- ALUNO -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Aluno
                                </label>

                                <input
                                    type="text"
                                    name="aluno"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Nome do aluno">

                            </div>

                            <!-- TURMA -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Turma
                                </label>

                                <input
                                    type="text"
                                    name="turma"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Ex: 3° DEV">

                            </div>

                            <!-- TIPO -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Tipo
                                </label>

                                <select
                                    name="tipo"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none">

                                    <option value="">
                                        Selecione
                                    </option>

                                    <option value="entrada">
                                        Entrada
                                    </option>

                                    <option value="saida">
                                        Saída
                                    </option>

                                </select>

                            </div>

                            <!-- HORARIO -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Horário
                                </label>

                                <input
                                    type="time"
                                    name="horario"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none">

                            </div>

                            <!-- FALTA -->
                            <div>

                                <label class="block text-slate-300 mb-3 font-semibold">
                                    Situação
                                </label>

                                <select
                                    name="falta"
                                    class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none">

                                    <option value="">
                                        Selecione
                                    </option>

                                    <option value="sem_falta">
                                        Sem Falta
                                    </option>

                                    <option value="com_falta">
                                        Com Falta
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- AULA -->
                        <div class="mt-6">

                            <label class="block text-slate-300 mb-3 font-semibold">
                                Aula
                            </label>

                            <input
                                type="text"
                                name="aula"
                                class="w-full bg-slate-800 border border-slate-600 rounded-2xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="Ex: Back-End">

                        </div>

                        <!-- TEXTO -->
                        <div class="bg-slate-800 border border-slate-700 rounded-3xl p-8 mt-8">

                            <p class="text-slate-300 leading-9 text-lg">

                                Ao professor responsável, autorizo o aluno
                                <strong class="text-white">[Aluno]</strong>
                                da turma
                                <strong class="text-white">[Turma]</strong>
                                a realizar
                                <strong class="text-white">[Entrada/Saída]</strong>
                                no horário
                                <strong class="text-white">[Horário]</strong>,
                                referente à aula de
                                <strong class="text-white">[Aula]</strong>.

                            </p>

                        </div>

                        <!-- BOTÃO -->
                        <div class="mt-8">

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 transition px-8 py-4 rounded-2xl text-white font-bold shadow-2xl">

                                Salvar Autorização

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>