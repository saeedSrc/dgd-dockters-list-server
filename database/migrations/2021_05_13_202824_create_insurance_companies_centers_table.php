<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceCompaniesCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_companies_centers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_company');
            $table->unsignedBigInteger('center');

            $table->foreign('insurance_company')->references('id')->on('insurance_companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('center')->references('id')->on('centers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('insurance_companies_centers');
    }
}
