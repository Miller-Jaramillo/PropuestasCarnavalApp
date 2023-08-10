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
        Schema::table('propuestas', function (Blueprint $table) {
            $table->enum('estado', [ 'enviada','revision', 'publicada', 'rechazada'])->default('enviada')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propuestas', function (Blueprint $table) {
            $table->enum('estado', ['publicada', 'revision', 'rechazada'])->default('revision');
        });
    }
};
