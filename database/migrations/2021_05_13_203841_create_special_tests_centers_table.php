<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialTestsCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_tests_centers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('special_test_id');
            $table->unsignedBigInteger('center_id');

//            $table->foreign('special_test_id')->references('id')->on('special_tests')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('center_id')->references('id')->on('centers')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('special_tests_centers');
    }
}
