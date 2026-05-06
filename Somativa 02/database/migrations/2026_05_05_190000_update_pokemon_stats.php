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
        Schema::table('pokemons', function (Blueprint $table) {
            // Renomear coluna 'vida' para 'hp' se existir
            if (Schema::hasColumn('pokemons', 'vida')) {
                $table->renameColumn('vida', 'hp');
            } else {
                $table->integer('hp')->nullable();
            }
            
            // Adicionar as novas colunas
            if (!Schema::hasColumn('pokemons', 'ataque_especial')) {
                $table->integer('ataque_especial')->nullable();
            }
            
            if (!Schema::hasColumn('pokemons', 'defesa_especial')) {
                $table->integer('defesa_especial')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pokemons', function (Blueprint $table) {
            if (Schema::hasColumn('pokemons', 'hp')) {
                $table->renameColumn('hp', 'vida');
            }
            
            if (Schema::hasColumn('pokemons', 'ataque_especial')) {
                $table->dropColumn('ataque_especial');
            }
            
            if (Schema::hasColumn('pokemons', 'defesa_especial')) {
                $table->dropColumn('defesa_especial');
            }
        });
    }
};
