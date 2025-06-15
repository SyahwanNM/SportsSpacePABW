<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToLapangansTable extends Migration
{
    public function up()
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id_field');

            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
