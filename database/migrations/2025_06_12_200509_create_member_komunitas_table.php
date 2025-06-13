<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberKomunitasTable extends Migration
{
    public function up()
    {
        Schema::create('member_komunitas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id_kmnts'); // Relasi ke komunitas
            $table->unsignedBigInteger('user_id');  // Relasi ke users
            $table->timestamp('join_at')->nullable(); // Tanggal join

            // Foreign keys
            $table->foreign('id_kmnts')->references('id_kmnts')->on('komunitas')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            // Optional index (recommended)
            $table->unique(['id_kmnts', 'user_id']); // Mencegah duplicate keanggotaan
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_komunitas');
    }
}
