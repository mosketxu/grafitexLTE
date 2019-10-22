<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignResumenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_resumenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->integer('store');
            $table->string('name');
            $table->string('country',2);
            $table->string('area');
            $table->string('segmento');
            $table->string('storeconcept');
            $table->string('ubicacion');
            $table->string('mobiliario');
            $table->string('propxelemento');
            $table->string('carteleria');
            $table->string('medida');
            $table->string('material');
            $table->string('unitxprop');
            $table->string('imagen')->nullable();
            $table->string('observaciones')->nullable();
            $table->decimal('precio')->nullable();
            $table->string('tanda')->nullable();
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
        Schema::dropIfExists('campaign_resumenes');
    }
}
