<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();  // Gunakan bigIncrements untuk id (unsignedBigInteger secara default)
            $table->string('name', 255);
            $table->integer('points_required');
            $table->integer('stock');
            $table->string('image_path', 255)->nullable();
            $table->timestamps(); // Menambahkan timestamps untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('rewards');
    }
}
