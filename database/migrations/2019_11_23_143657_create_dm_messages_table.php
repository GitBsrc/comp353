<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dm_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            #the message is created by (user)
            $table->unsignedBigInteger('user_id');
            # the dm
            $table->mediumText('message_body');
            $table->timestamps();
            # from the user model
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dm_messages');
    }
}
