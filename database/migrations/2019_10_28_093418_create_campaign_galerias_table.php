<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_galerias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');;
            $table->string('mobiliario');
            $table->string('carteleria')->default('pordefecto.jpg');
            $table->string('medida')->default('pordefecto.jpg');
            $table->string('elemento')->index();
            $table->string('eci',3)->nullable();
            $table->string('imagen')->default('pordefecto.jpg');
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
        Schema::dropIfExists('campaign_galerias');
    }
}
