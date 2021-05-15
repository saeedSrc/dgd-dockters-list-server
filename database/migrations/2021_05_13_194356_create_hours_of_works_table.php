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
            $table->string('saturday_start')->default("08:00");
            $table->string('saturday_end')->default("22:00");

            $table->string('sunday_start')->default("08:00");
            $table->string('sunday_end')->default("22:00");

            $table->string('monday_start')->default("08:00");
            $table->string('monday_end')->default("22:00");

            $table->string('thursday_start')->default("08:00");
            $table->string('thursday_end')->default("22:00");

            $table->string('wednesday_start')->default("08:00");
            $table->string('wednesday_end')->default("22:00");

            $table->string('tuesday_start')->default("08:00");
            $table->string('tuesday_end')->default("22:00");

            $table->string('friday_start')->default("08:00");
            $table->string('friday_end')->default("22:00");
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
