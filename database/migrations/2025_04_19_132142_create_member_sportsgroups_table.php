<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberSportsgroupsTable extends Migration
{
    public function up()
    {
        Schema::create('member_sportsgroups', function (Blueprint $table) {
            $table->id('id_member'); // Menggunakan bigIncrements() untuk id_member
            $table->unsignedBigInteger('id'); // Tipe data id yang mengacu ke sports_group
            $table->unsignedBigInteger('user_id');
            $table->timestamp('join_at')->useCurrent();
            $table->foreign('id')->references('id')->on('sports_groups')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_sportsgroups');
    }
}
