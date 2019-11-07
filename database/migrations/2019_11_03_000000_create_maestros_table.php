<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store')->index();
            $table->string('country');
            $table->string('name')->index();
            $table->string('area');
            $table->string('segment2018')->nullable();
            $table->string('segmento')->index();
            $table->string('storeconcept');
            $table->string('ubicacion');
            $table->string('mobiliario')->index();
            $table->string('propxelemento')->index();
            $table->string('carteleria');
            $table->string('medida')->index();
            $table->string('material');
            $table->string('unitxprop')->nullable();
            $table->string('observaciones')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('maestros');
    }
}
