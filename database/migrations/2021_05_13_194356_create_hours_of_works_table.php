<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours_of_works', function (Blueprint $table) {
            $table->id();
            $table->integer('saturday_start');
            $table->integer('saturday_end');

            $table->integer('sunday_start');
            $table->integer('sunday_end');

            $table->integer('monday_start');
            $table->integer('monday_end');

            $table->integer('thursday_start');
            $table->integer('thursday_end');

            $table->integer('wednesday_start');
            $table->integer('wednesday_end');

            $table->integer('tuesday_start');
            $table->integer('tuesday_end');

            $table->integer('friday_start');
            $table->integer('friday_end');
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
        Schema::dropIfExists('hours_of_works');
    }
}
