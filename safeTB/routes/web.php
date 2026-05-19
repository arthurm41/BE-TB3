<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorizacaoController;

Route::get('/', function () {
    return view('welcome');
});


// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// ROTAS DAS AUTORIZAÇÕES
Route::middleware(['auth'])->group(function () {

    // CRUD
    Route::resource('autorizacoes', AutorizacaoController::class);

    // Professor aprova
    Route::post('/aprovar-professor/{id}', [AutorizacaoController::class, 'aprovarProfessor'])
        ->name('aprovar.professor');

    // Portaria valida saída
    Route::post('/validar-portaria/{id}', [AutorizacaoController::class, 'validarPortaria'])
        ->name('validar.portaria');

    Route::get('/professor', [AutorizacaoController::class, 'professor'])
    ->middleware('auth')
    ->name('professor');

    Route::post('/liberar/{id}', [AutorizacaoController::class, 'liberar'])
    ->middleware('auth')
    ->name('liberar');

    Route::get('/portaria', [AutorizacaoController::class, 'portaria'])
    ->middleware('auth')
    ->name('portaria');

    Route::post('/validar/{id}', [AutorizacaoController::class, 'validarPortaria'])
    ->middleware('auth')
    ->name('validar');

});

require __DIR__.'/auth.php';