<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPoinsTable extends Migration
{
    public function up()
    {
        Schema::create('user_poins', function (Blueprint $table) {
            $table->integer('id_poin')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal_apply');
            $table->integer('jumlah_poin');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_poins');
    }
}
