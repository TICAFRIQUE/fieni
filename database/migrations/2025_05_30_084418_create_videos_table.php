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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('lien')->unique()->nullable(); // URL of the video
            $table->enum('status', ['active', 'desactive'])->default('active'); // Status of the video public or private
            $table->enum('vedette', ['oui', 'non'])->default('non'); // video in featured section
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
