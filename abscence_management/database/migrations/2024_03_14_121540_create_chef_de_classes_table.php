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
        Schema::create('chef_de_classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_etudiant');
            $table->string('mdp_etudiant');
            $table->string('type_etudiant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_de_classes');
    }
};
