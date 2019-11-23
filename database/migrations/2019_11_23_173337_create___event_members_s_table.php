<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMembersSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__event_members_s', function (Blueprint $table) {
            $table->primary(['user_id','event_id']);
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('__event_s');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('member_type_id')->unsigned();
            $table->foreign('member_type_id')->references('id')->on('__event_member_type_s');
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
        Schema::dropIfExists('__event_members_s');
    }
}
