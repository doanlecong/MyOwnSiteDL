<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyImageForPostContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_image_for_post_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('my_sub_contents_id');
            $table->string('file_path_raw');
            $table->string('file_path_thumbnail');
            $table->string('caption');
            $table->string('image_type');
            $table->integer('image_raw_size');
            $table->string('image_raw_dimensions')->comment('width x height');
            $table->integer('image_thumb_size');
            $table->string('image_thumb_dimensions')->comment('width x height');
            $table->string('my_tags_id');
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
        Schema::dropIfExists('my_image_for_post_contents');
    }
}
