<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id_post')->autoIncrement();
            
            // Kolom user_id dengan tipe yang sama seperti primary key user_id di users table
            $table->unsignedBigInteger('user_id');
            
            $table->string('post_title', 255);
            $table->text('post_content');
            $table->string('post_image', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();

            // Foreign key constraint, mengacu ke user_id di tabel users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
