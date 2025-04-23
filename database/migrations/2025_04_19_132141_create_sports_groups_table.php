<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('sports_groups', function (Blueprint $table) {
            $table->id(); // Menggunakan bigIncrements() untuk id
            $table->unsignedBigInteger('user_id');
            $table->string('title', 255);
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('city', 100);
            $table->string('address', 255);
            $table->integer('kapasitas_maksimal');
            $table->integer('current_members')->default(0);
            $table->string('jenis_olahraga', 255);
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->integer('payment_amount');
            $table->timestamps(); // Menggunakan timestamps() untuk created_at dan updated_at
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sports_groups');
    }
}
