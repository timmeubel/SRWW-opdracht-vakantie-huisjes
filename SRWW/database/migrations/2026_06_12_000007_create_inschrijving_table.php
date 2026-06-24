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
        Schema::create('inschrijving', function (Blueprint $table) {
            $table->id();
            $table->string('naam')->nullable();
            $table->string('email')->nullable();
            $table->string('lidmaatschap')->nullable();
            $table->integer('personen')->nullable();
            $table->text('toelichting')->nullable();
            $table->integer('lotings_nummer')->nullable();
            $table->string('voorkeur_1')->nullable();
            $table->string('voorkeur_2')->nullable();
            $table->string('voorkeur_3')->nullable();
            $table->date('week_voorkeur_start')->nullable();
            $table->date('week_voorkeur_eind')->nullable();
            $table->unsignedBigInteger('loting_id')->nullable();
            $table->unsignedBigInteger('inschrijfronde_id')->nullable();
            
            $table->foreign('loting_id')->references('id')->on('loting')->onDelete('set null');
            $table->foreign('inschrijfronde_id')->references('id')->on('inschrijfronde')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inschrijving');
    }
};
