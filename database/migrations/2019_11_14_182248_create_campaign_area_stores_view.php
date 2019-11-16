<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignAreaStoresView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_campaign_area_stores 
                as select 
                    campaign_id,
                    country,
                    zona,
                    store
                from campaign_elementos 
                group by 
                    campaign_id, 
                    country,
                    zona,
                    store
                ;"
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_campaign_area_stores");
    }
}
