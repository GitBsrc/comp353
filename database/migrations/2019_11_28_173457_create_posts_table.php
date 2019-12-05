<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userID');
            $table->string('firstName'); //Pretty sure this is redundant
            $table->unsignedBigInteger('constraint');
            $table->unsignedBigInteger('groupID')->onDelete('cascade');
            $table->unsignedBigInteger('eventID')->nullable()->onDelete('cascade');
            $table->timestamps();

            $table->foreign('groupID')->references('id')->on('group')->onDelete('cascade');
            $table->foreign('eventID')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('constraint')->references('id')->on('constraints');
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
