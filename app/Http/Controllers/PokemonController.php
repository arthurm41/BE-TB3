<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $pokemonNome = $request->get('pokemon', 'pikachu');

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemonNome}");

        $pokemon = null;

        if ($response->successful()) {
            $pokemon = $response->json();
        }

        $cadastrados = Pokemon::where('nome', 'like', "%{$pokemonNome}%")->get();

        return view('pokemon', compact('pokemon', 'cadastrados'));
    }

    public function create()
    {
        return view('pokemon_cadastrar');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|min:3',
            'tipo' => 'required',
            'ataque' => 'required|integer',
            'vida' => 'nullable|integer',
            'defesa' => 'nullable|integer',
            'velocidade' => 'nullable|integer',
            'imagem' => 'nullable|url'
        ]);

        Pokemon::create($dados);

        return redirect('/pokedex')->with('sucesso', 'Pokémon criado!');
    }

    public function destroy($id)
    {
        Pokemon::findOrFail($id)->delete();
        return back();
    }
}