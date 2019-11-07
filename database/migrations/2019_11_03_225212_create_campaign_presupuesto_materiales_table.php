<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPresupuestoMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_presupuesto_materiales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('presupuesto_id');
            $table->foreign('presupuesto_id')->references('id')->on('campaign_presupuestos');
            $table->string('concepto');
            $table->decimal('preciounidad')->default(0);
            $table->integer('unidades')->default(0)->nullable();
            $table->integer('uxprop')->default(0)->nullable();
            $table->decimal('total')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('campaign_presupuesto_materiales');
    }
}