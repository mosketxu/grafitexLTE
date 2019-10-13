<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignStore extends Model
{
    protected $fillable=['campaign_id','store_id','store'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
