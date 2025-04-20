<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPoinsTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_poins', function (Blueprint $table) {
            $table->id();  // Gunakan bigIncrements untuk id (unsignedBigInteger secara default)
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reward_id');
            $table->timestamp('created_at')->useCurrent();
            $table->index(['user_id', 'reward_id']);
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('reward_id')
                  ->references('id')  // Mengacu pada kolom id di tabel rewards
                  ->on('rewards')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_poins');
    }
}
