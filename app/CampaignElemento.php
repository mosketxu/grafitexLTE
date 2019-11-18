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
        'imagen','observaciones','precio'
    ];

    public function scopeSearch($query, $busca)
    {
      return $query->where('store', 'LIKE', "%$busca%")
      ->orWhere('name', 'LIKE', "%$busca%")
      ->orWhere('country', 'LIKE', "%$busca%")
      ->orWhere('area', 'LIKE', "%$busca%")
      ->orWhere('segmento', 'LIKE', "%$busca%")
      ->orWhere('storeconcept', 'LIKE', "%$busca%")
      ->orWhere('ubicacion', 'LIKE', "%$busca%")
      ->orWhere('mobiliario', 'LIKE', "%$busca%")
      ->orWhere('propxelemento', 'LIKE', "%$busca%")
      ->orWhere('carteleria', 'LIKE', "%$busca%")
      ->orWhere('medida', 'LIKE', "%$busca%")
      ->orWhere('material', 'LIKE', "%$busca%")
      ->orWhere('observaciones', 'LIKE', "%$busca%") 
      ;
    }

    public $timestamps = true;
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
