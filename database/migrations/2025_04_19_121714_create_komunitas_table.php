<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomunitasTable extends Migration
{
    public function up()
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id('id_kmnts');
            $table->string('nama');
            $table->string('jns_olahraga');
            $table->integer('max_members');
            $table->string('provinsi');
            $table->string('kota');
            $table->text('deskripsi')->nullable();    
            $table->string('foto');
            $table->string('sampul');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');  // Kolom status
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('komunitas', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(false)->change();
        });
    }
}
