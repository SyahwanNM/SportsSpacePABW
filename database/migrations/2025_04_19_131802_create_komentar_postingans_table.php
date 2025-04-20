<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPostingansTable extends Migration
{
    public function up()
    {
        Schema::create('komentar_postingans', function (Blueprint $table) {
            $table->integer('id_komentar')->autoIncrement();
            $table->Integer('id_post');
            $table->unsignedBigInteger('user_id');
            $table->text('komentar');
            $table->dateTime('tanggalwaktu');
            $table->index('id_post');
            $table->index('user_id');
            $table->foreign('id_post')
                  ->references('id_post')
                  ->on('posts')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar_postingans');
    }
}
