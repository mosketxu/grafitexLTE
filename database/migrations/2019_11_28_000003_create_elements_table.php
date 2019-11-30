<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('elementificador',400)->index()->unique;
            $table->bigInteger('ubicacion_id')->index()->nullable();
            $table->string('ubicacion',30);
            $table->bigInteger('mobiliario_id')->index()->nullable();
            $table->string('mobiliario',100);
            $table->bigInteger('propxelemento_id')->index()->nullable();
            $table->string('propxelemento',50);
            $table->bigInteger('carteleria_id')->index()->nullable();
            $table->string('carteleria',50);
            $table->bigInteger('medida_id')->index()->nullable();
            $table->string('medida',50)->index();
            $table->bigInteger('material_id')->index()->nullable();
            $table->string('material',50)->index();
            $table->bigInteger('unitxprop_id')->index()->nullable();
            $table->string('unitxprop',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}
