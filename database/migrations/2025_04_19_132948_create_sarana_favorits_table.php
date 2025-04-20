<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaFavoritsTable extends Migration
{
    public function up()
    {
        Schema::create('sarana_favorits', function (Blueprint $table) {
            $table->char('id_favorit', 36)->primary(); // Menambahkan UUID sebagai id_favorit
            $table->unsignedBigInteger('id_field');  // Gunakan unsignedBigInteger untuk id_field
            $table->unsignedBigInteger('user_id');
            $table->timestamp('tanggal_ditambahkan')->useCurrent();
            $table->index('id_field');
            $table->index('user_id');
            $table->foreign('id_field')
                  ->references('id_field')
                  ->on('lapangans') // Menggunakan tabel 'lapangans'
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sarana_favorits');
    }
}
