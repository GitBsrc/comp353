<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_members', function (Blueprint $table) {
            $table->primary(['user_id','event_id']);
            $table->unsignedBigInteger('event_id')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->unsignedBigInteger('member_type_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('member_type_id')->references('id')->on('event_member_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__event_members_s');
    }
}
