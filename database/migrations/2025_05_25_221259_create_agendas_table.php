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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->string('lieu')->nullable();
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_public')->default(true);
            $table->enum('etat', ['a_venir', 'en_cours', 'termine'])->default('a_venir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
