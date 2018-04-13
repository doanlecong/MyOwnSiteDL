<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyMailToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_mail_to_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('May have or not');
            $table->integer('response_for_id');
            $table->string('type_response');
            $table->longText('content');
            $table->string('status');
            $table->timestamp('time_to_send');
            $table->string('should_resend');
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
        Schema::dropIfExists('my_mail_to_users');
    }
}
