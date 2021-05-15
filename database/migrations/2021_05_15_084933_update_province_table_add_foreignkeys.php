<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProvinceTableAddForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->foreign('country')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->foreign('country')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');;
        });
    }
}
