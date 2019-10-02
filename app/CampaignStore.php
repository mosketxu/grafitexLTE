<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignStore extends Model
{
    protected $fillable=['id','campaign_id','store_id'];
    // protected $dates = ['deleted_at'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
