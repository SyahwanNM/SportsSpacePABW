<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingLapangansTable extends Migration
{
    public function up()
    {
        Schema::create('rating_lapangans', function (Blueprint $table) {
            $table->string('id_rating', 36)->primary(); // UUID disimpan sebagai string dengan panjang 36
            $table->unsignedBigInteger('id_field');
            $table->unsignedBigInteger('user_id');
            $table->float('rating');
            $table->text('komentar')->nullable();
            $table->dateTime('tanggalwaktu');
            $table->index('id_field');
            $table->index('user_id');
            $table->foreign('id_field')
                  ->references('id_field')
                  ->on('lapangans')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rating_lapangans');
    }
}
