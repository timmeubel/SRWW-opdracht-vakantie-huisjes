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
        Schema::table('foto', function (Blueprint $table) {
            $table->unsignedBigInteger('vacation_house_id')->nullable()->after('id');
            $table->integer('sort_order')->default(0)->after('url');
            $table->foreign('vacation_house_id')->references('id')->on('vacation_houses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foto', function (Blueprint $table) {
            $table->dropForeign(['vacation_house_id']);
            $table->dropColumn(['vacation_house_id', 'sort_order']);
        });
    }
};
