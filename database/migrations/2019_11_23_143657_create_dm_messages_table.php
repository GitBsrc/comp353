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
            $table->unsignedBigInteger('sender');
            $table->foreign('sender')->references('id')->on('users');
            # the dm
            $table->mediumText('message_body');
            $table->timestamps();
            # from the user model
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
