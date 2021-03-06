<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site');
            $table->string('technical_manager_name');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->integer('area');
            $table->string('area_name');
            $table->integer('discount');
            $table->float('satisfaction');
            $table->integer('satisfaction_num')->default(0);
            $table->unsignedBigInteger('hours_of_work_id');
            $table->enum('governmental_type', ['governmental', 'private']);
            $table->unsignedBigInteger('type_id');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->string('logo');
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
        Schema::dropIfExists('centers');
    }
}
