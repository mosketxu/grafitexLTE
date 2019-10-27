<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignElemento extends Model
{
    // protected $table = 'campaign_resumenes';
    protected $fillable=['campaign_id',
        'store','country','name','area','segmento',
        'storeconcept','ubicacion','mobiliario','propxlemento',
        'carteleria','medida','material','unitxprop',
        'imagen','observaciones','precio','tanda'
    ];

    public $timestamps = true;
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
