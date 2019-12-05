<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('groupID')->nullable();
            $table->string('name');
            $table->string('description', 1000);
            $table->timestamp('startDate');
            $table->timestamp('endDate')->nullable();
            $table->string('location');
            $table->integer('recurrence');
            $table->string('status');
            $table->string('type');
            $table->decimal('discount',9,3);
            $table->decimal('price',9,3);
            $table->decimal('bandwidth',9,3);
            $table->integer('storage');
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
        Schema::dropIfExists('__event_s');
    }
}
