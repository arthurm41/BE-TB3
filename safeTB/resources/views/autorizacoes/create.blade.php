<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <h1 class="text-3xl font-bold mb-8 text-gray-800">
                Nova Autorização
            </h1>

            <form action="{{ route('autorizacoes.store') }}" method="POST">

                @csrf

                <!-- PROFESSOR -->
                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Professor Responsável
                    </label>

                    <input
                        type="text"
                        name="professor"
                        class="w-full border rounded-lg p-3"
                        placeholder="Nome do professor">
                </div>

                <!-- TEXTO -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Nome do Aluno
                    </label>

                    <input
                        type="text"
                        name="aluno"
                        class="w-full border rounded-lg p-3"
                        placeholder="Nome do aluno">

                </div>

                <!-- TURMA -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Turma
                    </label>

                    <input
                        type="text"
                        name="turma"
                        class="w-full border rounded-lg p-3"
                        placeholder="Ex: 2° DS">

                </div>

                <!-- TIPO -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Tipo de Liberação
                    </label>

                    <select
                        name="tipo"
                        class="w-full border rounded-lg p-3">

                        <option value="">Selecione</option>

                        <option value="entrada">
                            Entrada
                        </option>

                        <option value="saida">
                            Saída
                        </option>

                    </select>

                </div>

                <!-- HORARIO -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Horário
                    </label>

                    <input
                        type="time"
                        name="horario"
                        class="w-full border rounded-lg p-3">

                </div>

                <!-- FALTA -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Situação da Aula
                    </label>

                    <select
                        name="falta"
                        class="w-full border rounded-lg p-3">

                        <option value="">Selecione</option>

                        <option value="sem_falta">
                            Sem falta
                        </option>

                        <option value="com_falta">
                            Com falta
                        </option>

                    </select>

                </div>

                <!-- AULA -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Aula
                    </label>

                    <input
                        type="text"
                        name="aula"
                        class="w-full border rounded-lg p-3"
                        placeholder="Ex: Matemática">

                </div>

                <!-- TEXTO FINAL -->
                <div class="bg-gray-100 rounded-lg p-5 mb-6">

                    <p class="text-gray-700 leading-8">

                        Ao prof.
                        <strong>[Professor]</strong>,
                        autorizo o aluno
                        <strong>[Aluno]</strong>
                        da turma
                        <strong>[Turma]</strong>
                        a realizar
                        <strong>[Entrada/Saída]</strong>
                        às
                        <strong>[Horário]</strong>,
                        referente à aula de
                        <strong>[Aula]</strong>,
                        ficando registrado
                        <strong>[Com/Sem Falta]</strong>.

                    </p>

                </div>

                <!-- BOTÃO -->
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    Salvar Autorização

                </button>

            </form>

        </div>

    </div>

</x-app-layout>