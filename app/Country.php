<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['country'];

    public function countries()
    {
        return $this->hasMany(CampaignCountry::class);
    }
}
