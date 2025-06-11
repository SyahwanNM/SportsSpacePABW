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
        Schema::table('lapangans', function (Blueprint $table) {
            $table->string('type', 50)->change();
            $table->string('categori', 50)->change();
            $table->string('opening_hours', 50)->change();
            $table->string('closing_hours', 50)->change();
            $table->text('fasility')->change();
            $table->text('description')->change();
            $table->text('address')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->string('type')->change();
            $table->string('categori')->change();
            $table->string('opening_hours')->change();
            $table->string('closing_hours')->change();
            $table->string('fasility')->change();
            $table->string('description')->change();
            $table->string('address')->change();
        });
    }
};
