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
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['active', 'desactive'])->default('active');
            $table->enum('vedette', ['oui', 'non'])->default('non');
            $table->dateTime('date_publication')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actualites');
    }
};
