<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_id');
            $table->integer('address_totstore');
            $table->string('address_countrycode',2);
            $table->string('address_channel');
            $table->string('address_storename');
            $table->string('address_address');
            $table->string('address_number');
            $table->string('address_city');
            $table->string('address_province');
            $table->string('address_postalcode');
            $table->string('address_phone');
            $table->string('address_email');
            $table->string('address_storeconcept');
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
        Schema::dropIfExists('addresses');
    }
}
