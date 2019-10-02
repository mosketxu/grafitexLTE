<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    protected $fillable=['campaign_name','campaign_initdate','campaign_enddate','campaign_state','slug'];
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
       // registering a callback to be executed upon the creation of an activity AR
        static::creating(function($campaign) {
        $campaign->slug= \Str::slug($campaign->campaign_name);
        // check to see if any other slugs exist that are the same & count them
        $count = static::whereRaw("slug RLIKE '^{$campaign->slug}(-[0-9]+)?$'")->count();
        // if other slugs exist that are the same, append the count to the slug
            $campaign->slug = $count ? "{$campaign->slug}-{$count}" : $campaign->slug;
         });
    }

    public function campaignStore(){
        return $this->hasMany(CampaignStore::class);
    }
}
