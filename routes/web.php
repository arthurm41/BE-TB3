<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Pokemon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// POKEDEX
Route::get('/pokedex', function (Request $request) {

    $pokemonNome = $request->get('pokemon', 'pikachu');

    $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemonNome}");

    $pokemon = null;

    if ($response->successful()) {
        $pokemon = $response->json();
    }

    return view('pokemon', compact('pokemon'));
});


// PRÓXIMO POKÉMON ALEATÓRIO
Route::get('/proximo-pokemon', function () {
    $randomId = rand(1, 1025);
    $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$randomId}");
    
    $pokemon = null;
    
    if ($response->successful()) {
        $pokemon = $response->json();
    }
    
    return view('pokemon', compact('pokemon'));
});


// MEUS POKEMONS
Route::get('/meus-pokemons', function () {
    $cadastrados = Pokemon::all();
    return view('meus_pokemons', compact('cadastrados'));
});


// EDITAR POKEMON
Route::get('/pokemon/{id}/editar', function ($id) {
    $pokemon = Pokemon::findOrFail($id);
    $tipos = explode(',', $pokemon->tipo);
    return view('pokemon_editar', compact('pokemon', 'tipos'));
});


// SALVAR EDIÇÃO
Route::post('/pokemon/{id}/editar', function (Request $request, $id) {
    $pokemon = Pokemon::findOrFail($id);

    $dados = $request->validate([
        'nome' => 'required|min:3',
        'tipo' => 'required|array|min:1|max:2',
        'tipo.*' => 'in:normal,fire,water,electric,grass,ice,fighting,poison,ground,flying,psychic,bug,rock,ghost,dragon,dark,steel,fairy',
        'hp' => 'nullable|integer|min:0|max:500',
        'ataque' => 'nullable|integer|min:0|max:500',
        'defesa' => 'nullable|integer|min:0|max:500',
        'ataque_especial' => 'nullable|integer|min:0|max:500',
        'defesa_especial' => 'nullable|integer|min:0|max:500',
        'velocidade' => 'nullable|integer|min:0|max:500',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120'
    ]);

    // Converter array de tipos para string separada por vírgula (remover vazios e duplicatas)
    $tipos = array_unique(array_filter($request->tipo));
    $dados['tipo'] = implode(',', $tipos);

    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $folder = public_path('images/pokemons');
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $fileName = uniqid('poke_', true) . '.' . $request->imagem->extension();
        $request->imagem->move($folder, $fileName);
        $dados['imagem'] = "images/pokemons/{$fileName}";
    }

    $pokemon->update($dados);

    return redirect('/meus-pokemons');
});


// CADASTRO
Route::get('/pokemon/cadastrar', function () {
    return view('pokemon_cadastrar');
});


// SALVAR (COM UPLOAD DE IMAGEM)
Route::post('/pokemon/cadastrar', function (Request $request) {

    $dados = $request->validate([
        'nome' => 'required|min:3',
        'tipo' => 'required|array|min:1|max:2',
        'tipo.*' => 'in:normal,fire,water,electric,grass,ice,fighting,poison,ground,flying,psychic,bug,rock,ghost,dragon,dark,steel,fairy',
        'hp' => 'nullable|integer|min:0|max:500',
        'ataque' => 'nullable|integer|min:0|max:500',
        'defesa' => 'nullable|integer|min:0|max:500',
        'ataque_especial' => 'nullable|integer|min:0|max:500',
        'defesa_especial' => 'nullable|integer|min:0|max:500',
        'velocidade' => 'nullable|integer|min:0|max:500',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120'
    ]);

    // Converter array de tipos para string separada por vírgula (remover vazios e duplicatas)
    $tipos = array_unique(array_filter($request->tipo));
    $dados['tipo'] = implode(',', $tipos);

    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $folder = public_path('images/pokemons');
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $fileName = uniqid('poke_', true) . '.' . $request->imagem->extension();
        $request->imagem->move($folder, $fileName);
        $dados['imagem'] = "images/pokemons/{$fileName}";
    } else {
        $queries = ['animal', 'anime'];
        $query = $queries[array_rand($queries)];
        if ($query == 'animal') {
            $dados['imagem'] = "https://loremflickr.com/100/100/animal";
        } else {
            $dados['imagem'] = "https://source.unsplash.com/100x100/?anime";
        }
    }

    Pokemon::create($dados);

    return redirect('/pokedex');
});


// DELETAR
Route::delete('/pokemon/{id}', function ($id) {
    Pokemon::find($id)?->delete();
    return back();
});