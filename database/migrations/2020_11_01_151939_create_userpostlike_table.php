<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpostlikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_like', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('like_state')->default(1);

            $table->primary(['user_id', 'post_id']);
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_post_like');
    }
}
