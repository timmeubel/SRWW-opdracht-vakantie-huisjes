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
        Schema::create('foto', function (Blueprint $table) {
            $table->id();
            // 1. Added the missing foreign key column here
            $table->foreignId('vacation_house_id')->constrained('vacation_houses')->onDelete('cascade');
            $table->string('url');
            // If you are sorting photos, you might also want to add this:
            // $table->integer('sort_order')->default(0); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};