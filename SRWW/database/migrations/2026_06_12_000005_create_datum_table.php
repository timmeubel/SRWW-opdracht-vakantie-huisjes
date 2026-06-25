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
<<<<<<<< HEAD:SRWW/database/migrations/2026_06_04_073130_add_timestamps_to_user_table.php
        Schema::table('user', function (Blueprint $table) {
            //
========
        Schema::create('datum', function (Blueprint $table) {
            $table->id();
            $table->date('date');
>>>>>>>> d8948be6e361ef2e9f598cb55ec6761723afd248:SRWW/database/migrations/2026_06_12_000005_create_datum_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:SRWW/database/migrations/2026_06_04_073130_add_timestamps_to_user_table.php
        Schema::table('user', function (Blueprint $table) {
            //
        });
========
        Schema::dropIfExists('datum');
>>>>>>>> d8948be6e361ef2e9f598cb55ec6761723afd248:SRWW/database/migrations/2026_06_12_000005_create_datum_table.php
    }
};
