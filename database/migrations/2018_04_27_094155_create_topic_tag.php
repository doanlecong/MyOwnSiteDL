<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_tag_my_topic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('my_topic_id')->unsigned();
            $table->foreign('my_topic_id')->references('id')->on('my_topics');

            $table->integer('my_tag_id')->unsigned();
            $table->foreign('my_tag_id')->references('id')->on('my_tags');

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
        Schema::dropIfExists('my_topic_tags');
    }
}
