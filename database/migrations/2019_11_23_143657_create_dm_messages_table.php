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
            $table->increment('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->mediumText('message_body');
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
        Schema::dropIfExists('dm_messages');
    }
}
