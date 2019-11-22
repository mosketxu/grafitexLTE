<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('familia')->index();
            $table->integer('tramo1');
            $table->decimal('tarifa1');
            $table->integer('tramo2');
            $table->decimal('tarifa2',8,2);
            $table->integer('tramo3');
            $table->float('tarifa3');
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
        Schema::dropIfExists('tarifas');
    }
}
