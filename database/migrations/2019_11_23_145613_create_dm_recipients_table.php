<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dm_recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            #the message intended for
            $table->unsignedBigInteger('recipient');
            $table->foreign('recipient')->references('id')->on('users');
            # the message id 
            $table->unsignedBigInteger('message_id');
            $table->foreign('message_id')->references('id')->on('dm_messages');
            # the message is sent to 
            // $table->unique(["recipient","message_id"]);
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
        Schema::dropIfExists('dm_recipients');
    }
}
