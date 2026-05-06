<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    protected $fillable = [
        'nome',
        'tipo',
        'hp',
        'ataque',
        'defesa',
        'ataque_especial',
        'defesa_especial',
        'velocidade',
        'imagem'
    ];
}