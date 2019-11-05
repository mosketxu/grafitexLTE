<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_elementos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->integer('store')->index();
            $table->string('name')->index();
            $table->string('country',2)->index();
            $table->string('area')->index();
            $table->string('segmento')->index();
            $table->string('storeconcept')->index();
            $table->string('ubicacion')->index();
            $table->string('mobiliario')->index();
            $table->string('propxelemento')->index();
            $table->string('carteleria')->index();
            $table->string('medida')->index();
            $table->string('material')->index();
            $table->string('unitxprop');
            $table->string('imagen')->nullable();
            $table->string('observaciones')->nullable();
            $table->decimal('precio')->nullable();
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
        Schema::dropIfExists('campaign_elementos');
    }
}
