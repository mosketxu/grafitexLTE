<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignMedida extends Model
{
    protected $fillable=['id','campaign_id','medida'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

}
