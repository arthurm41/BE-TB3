<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autorizacao extends Model
{
    protected $table = 'autorizacoes';

    protected $fillable = [

        'professor',
        'aluno',
        'turma',
        'tipo',
        'horario',
        'falta',
        'aula',
        'status'

    ];
}