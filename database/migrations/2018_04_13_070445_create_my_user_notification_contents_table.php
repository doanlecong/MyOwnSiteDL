<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyUserNotificationContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_user_notification_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('my_users_id');
            $table->text('content');
            $table->string('type_noti');
            $table->string('link_to');
            $table->string('is_need_permission');

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
        Schema::dropIfExists('my_user_notification_contents');
    }
}
