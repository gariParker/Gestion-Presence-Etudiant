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
        Schema::create('model_enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enseignant');
            $table->string('mdp_enseignant');
            $table->string('type_enseignant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_enseignants');
    }
};
