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
        Schema::create('propuestas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_propuesta');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('identificacion');
            $table->string('nombre_agrupacion')->nullable();
            $table->text('descripcion');
            $table->string('foto_o_video')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->enum('estado', ['publicada', 'revision', 'rechazada'])->default('revision');

            // Claves Foráneas
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('subcategoria_id')->constrained('subcategorias')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propuestas', function (Blueprint $table) {
            // Eliminar la relación con la tabla "users"
            $table->dropForeign(['user_id']);

            // Eliminar la relación con la tabla "categorias"
            $table->dropForeign(['categoria_id']);

            // Eliminar la relación con la tabla "subcategorias"
            $table->dropForeign(['subcategoria_id']);

            // Eliminar las columnas "user_id", "categoria_id" y "subcategoria_id"
            $table->dropColumn(['user_id', 'categoria_id', 'subcategoria_id']);
        });

        Schema::dropIfExists('propuestas');
    }
};
