<?php
<<<<<<< HEAD
// phpcs:disable
=======

>>>>>>> c7e2262... Init project
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id');
<<<<<<< HEAD
            $table->string('tag_title');
=======
            $table->string('tag_title')->unique();
>>>>>>> c7e2262... Init project
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
