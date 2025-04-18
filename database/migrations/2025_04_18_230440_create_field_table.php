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
        Schema::create('field', function (Blueprint $table) {
            $table->id('id_field');
            $table->string('nama_lapangan');
            $table->enum('type', ['Football', 'futsal', 'badminton', 'basket', 'jogging', 'volly']);
            $table->enum('categori', ['paid', 'free']);
            $table->string('lokasi');
            $table->string('foto');
            $table->string('opening_hours');
            $table->string('closing_hours');
            $table->string('fasility');
            $table->integer('price');
            $table->string('description');
            $table->timestamps(); // Jika kamu ingin menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field');
    }
};
