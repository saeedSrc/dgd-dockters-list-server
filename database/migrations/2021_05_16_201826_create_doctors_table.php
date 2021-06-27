<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site');
            $table->string('system_medicine_number');
            $table->string('work_experience');
            $table->boolean('has_office');
            $table->unsignedBigInteger('country_id');
            $table->string('country');
            $table->unsignedBigInteger('province_id');
            $table->string('province');
            $table->unsignedBigInteger('city_id');
            $table->string('city');
            $table->unsignedBigInteger('college_id');
            $table->integer('area');
            $table->string('area_name');
            $table->integer('satisfaction');
            $table->decimal('latitude');
            $table->decimal('longitude');
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
        Schema::dropIfExists('doctors');
    }
}
