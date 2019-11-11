<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPaisStore extends Model
{
    protected $table = "campaign_pais_stores";
    protected $fillable=['campaign_id','country','store'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
