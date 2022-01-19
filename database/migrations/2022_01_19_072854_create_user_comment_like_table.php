<?php
// phpcs:disable
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCommentLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_comment_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->unsignedInteger("comment_id");
            $table->foreign('comment_id')->references('comment_id')->on('comments')->onDelete('cascade');
            $table->unsignedTinyInteger("like_state");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_comment_like');
    }
}
