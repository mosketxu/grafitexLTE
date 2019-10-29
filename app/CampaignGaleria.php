<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignGaleria extends Model
{
    protected $fillable=['campaign_id','elemento','imagen','observaciones'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? 'storage/galeria/' . $this->imagen : 'pordefecto.jpg';
    }
}
