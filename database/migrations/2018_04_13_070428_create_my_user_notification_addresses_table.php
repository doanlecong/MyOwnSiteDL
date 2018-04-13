<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyUserNotificationAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_user_notification_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notification_id');
            $table->integer('my_users_id');
            $table->string('remote_device_code');
            $table->string('status',1);

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
        Schema::dropIfExists('my_user_notification_addresses');
    }
}
