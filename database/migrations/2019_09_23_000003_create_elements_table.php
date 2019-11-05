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
        Schema::create('elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('element_ubicacion')->index();
            $table->string('element_mobiliario')->index();
            $table->string('element_propiedad')->index();
            $table->string('element_carteleria')->index();
            $table->string('element_medida')->index();
            $table->string('element_material')->index();
            $table->string('element_unit_x_prop');
            $table->decimal('element_price');
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
        Schema::dropIfExists('elements');
    }
}
