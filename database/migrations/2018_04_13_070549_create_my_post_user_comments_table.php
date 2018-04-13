<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyPostUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_post_user_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('my_users_id');
            $table->integer('my_posts_id');
            $table->text('comment');
            $table->string('comment_for_other_id');

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
        Schema::dropIfExists('my_post_user_comments');
    }
}
