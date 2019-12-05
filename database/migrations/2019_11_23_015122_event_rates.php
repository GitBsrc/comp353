<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('event',9,2);
            $table->decimal('bandwidth',9,2);
            $table->decimal('storage',9,2);
            $table->decimal('event_extension',9,2);
            $table->decimal('event_recurrence',9,2);
            $table->decimal('event_recurrence_discount',9,2);

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
        Schema::dropIfExists('__event_rates_s');
    }
}
