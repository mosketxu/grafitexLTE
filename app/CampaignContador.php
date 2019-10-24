<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignContador extends Model
{
    protected $table = 'campaign_contadores';
    protected $fillable=['campaign_id','segmento','ubicacion','medida',
        'mobiliario','area','material','totales','unidades'
    ];
}
