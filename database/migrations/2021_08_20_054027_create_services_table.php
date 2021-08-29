<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->bigInteger('stype_id')->unsigned()->nullable();
            $table->foreign('stype_id')->references('stype_id')->on('servicetypes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('service_name');
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
        Schema::dropIfExists('services');
    }
}
