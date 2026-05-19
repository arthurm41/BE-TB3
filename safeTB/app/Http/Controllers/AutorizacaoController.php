<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizacao;

class AutorizacaoController extends Controller
{
    // LISTAR ADMIN
    public function index()
    {
        $autorizacoes = Autorizacao::latest()->get();

        return view('autorizacoes.index', compact('autorizacoes'));
    }

    // FORMULÁRIO
    public function create()
    {
        // PROFESSOR E PORTARIA NÃO PODEM CRIAR
        if(
            auth()->user()->role == 'professor' ||
            auth()->user()->role == 'portaria'
        )
        {
            return redirect()->route('autorizacoes.index');
        }

        return view('autorizacoes.create');
    }

    // SALVAR
    public function store(Request $request)
    {
        // PROFESSOR E PORTARIA NÃO PODEM SALVAR
        if(
            auth()->user()->role == 'professor' ||
            auth()->user()->role == 'portaria'
        )
        {
            return redirect()->route('autorizacoes.index');
        }

        Autorizacao::create([

            'professor' => $request->professor,
            'aluno' => $request->aluno,
            'turma' => $request->turma,
            'tipo' => $request->tipo,
            'horario' => $request->horario,
            'falta' => $request->falta,
            'aula' => $request->aula,
            'status' => 'Pendente',

        ]);

        return redirect()
            ->route('autorizacoes.index')
            ->with('success', 'Autorização criada com sucesso!');
    }

    // PAINEL PROFESSOR
    public function professor()
    {
        $autorizacoes = Autorizacao::latest()->get();

        return view('professor.index', compact('autorizacoes'));
    }

    // PROFESSOR LIBERA ALUNO
    public function liberar($id)
    {
        $autorizacao = Autorizacao::findOrFail($id);

        $autorizacao->status = 'Liberado';

        $autorizacao->save();

        return redirect()
            ->back()
            ->with('success', 'Aluno liberado com sucesso!');
    }

    // PAINEL PORTARIA
    public function portaria()
    {
        $autorizacoes = Autorizacao::where('status', 'Liberado')
            ->latest()
            ->get();

        return view('portaria.index', compact('autorizacoes'));
    }

    // PORTARIA VALIDA
    public function validarPortaria($id)
    {
        $autorizacao = Autorizacao::findOrFail($id);

        $autorizacao->status = 'Validado na Portaria';

        $autorizacao->save();

        return redirect()
            ->back()
            ->with('success', 'Saída validada pela portaria!');
    }

    // MOSTRAR
    public function show(string $id)
    {
        //
    }

    // EDITAR
    public function edit(string $id)
    {
        //
    }

    // ATUALIZAR
    public function update(Request $request, string $id)
    {
        //
    }

    // DELETAR
    public function destroy(string $id)
    {
        //
    }
}