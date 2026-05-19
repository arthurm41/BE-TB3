<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('autorizacoes', function (Blueprint $table) {

    $table->id();

    $table->string('professor');

    $table->string('aluno');

    $table->string('turma');

    $table->string('tipo');

    $table->time('horario');

    $table->string('falta');

    $table->string('aula');

    $table->string('status')->default('Pendente');

    $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizacoes');
    }
};
