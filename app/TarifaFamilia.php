<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaFamilia extends Model
{
    protected $fillable=['tarifa_id','material','medida'];

    public function tarifafamilia()
    {
        return $this->belongsTo(Tarifa::class);
    }

    public function scopeSearch($query, $busca)
    {
      return $query->where('material', 'LIKE', "%$busca%")
      ->orWhere('medida', 'LIKE', "%$busca%")
      ;
    }


}
