<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacation_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->integer('guests');
            $table->integer('bedrooms');
            $table->string('tag');  // e.g. "Bosvilla", "Duinhuis"
            $table->string('icon');  // e.g. "🏡", "🏖️"
            $table->string('class_theme')->nullable();  // e.g. "img-forest", "img-beach"
            $table->text('short_description');
            $table->text('long_description');
            $table->text('amenities');  // Saved as a comma-separated string e.g. "Wifi, Jacuzzi, Sauna"
            $table->string('image_path')->nullable();  // For custom picture uploads
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacation_houses');
    }
};
