<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_posts',1);
            $table->integer('my_topics_id')->nullable();
            $table->string('slug');
            $table->string('title');
            $table->string('hinhdaidien')->nullable();
            $table->mediumText('description');
            $table->longText('content');
            $table->string('status',1)->default('N');
            $table->integer('previous_post_id')->nullable();
            $table->dateTime('time_publish')->nullable();

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
        Schema::dropIfExists('my_posts');
    }
}
