<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikePostingansTable extends Migration
{
    public function up()
    {
        Schema::create('like_postingans', function (Blueprint $table) {
            $table->integer('id_like')->autoIncrement();
            $table->Integer('id_post');
            $table->unsignedBigInteger('user_id');
            $table->unique(['id_post','user_id']);
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
        Schema::dropIfExists('like_postingans');
    }
}
