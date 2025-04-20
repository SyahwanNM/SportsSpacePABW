<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomunitasSayasTable extends Migration
{
    public function up()
    {
        Schema::create('komunitas_sayas', function (Blueprint $table) {
            $table->integer('id_komunitas_saya')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_kmnts');
            $table->index('user_id');
            $table->index('id_kmnts');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users');
            $table->foreign('id_kmnts')
                  ->references('id_kmnts')
                  ->on('komunitas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komunitas_sayas');
    }
}
