<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterSpecialTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_special_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('special_test_id');
            $table->unsignedBigInteger('center_id');
            $table->foreign('special_test_id')->references('id')->on('special_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('center_id')->references('id')->on('centers')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('center_special_test');
    }
}
