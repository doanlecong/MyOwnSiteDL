<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMyFileManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_file_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('filepath');
            $table->bigInteger('file_size');
            $table->string('image_size')->nullable();
            $table->string('file_type', 10);
            $table->string('purpose');
            $table->string('external_id');
            $table->string('controller_name')->nullable();
            $table->string('action_name')->nullable();

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
        Schema::dropIfExists('my_file_managements');
    }
}
