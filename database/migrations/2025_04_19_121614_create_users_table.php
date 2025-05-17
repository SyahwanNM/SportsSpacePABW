<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');

            $table->string('username', 255)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->date('tanggal_lahir');
            $table->enum('gender', ['Laki laki', 'Perempuan', '-']);
            $table->string('kota', 50);
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->integer('total_poin')->default(0);

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
