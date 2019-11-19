<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $fillable=['familia','tramo1','tarifa1','tramo2','tarifa2','tramo3','tarifa3'];

    public function tarifafamilias()
    {
        return $this->hasMany(TarifaFamilia::class);
    }

    public function campaignelementos()
    {
        return $this->hasMany(CampaignElemento::class);
    }

    public function scopeSearch($query, $busca)
    {
      return $query->where('familia', 'LIKE', "%$busca%")
      ->orWhere('tramo1', 'LIKE', "%$busca%")
      ->orWhere('tarifa1', 'LIKE', "%$busca%")
      ;
    }

 
}


