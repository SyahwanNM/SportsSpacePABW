<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapangansTable extends Migration
{
    public function up()
    {
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id('id_field');  // Menggunakan bigIncrements untuk id_field
            $table->string('nama_lapangan');
            $table->enum('type', ['Football', 'futsal', 'badminton', 'basket', 'jogging', 'volly']);
            $table->enum('categori', ['paid', 'free', '']);
            $table->string('lokasi');
            $table->string('foto');
            $table->string('opening_hours');
            $table->string('closing_hours');
            $table->string('fasility');
            $table->integer('price');
            $table->text('description');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lapangans');
    }
}
