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

    static function getFamilia($material,$medida)
    {
      $mat=trim($material);
      $med=trim($medida);
      $tarifa=TarifaFamilia::where('material',$mat)
      ->where('medida',$med)
      ->first();
      
      $familia=Tarifa::where('id',$tarifa['tarifa_id'])
      ->first();

      if (is_null($tarifa)) 
        $familia=Tarifa::where('id',0)->first();
      else
        $familia=Tarifa::where('id',$tarifa['tarifa_id'])
        ->first();
      
      if(is_null($familia))
        $familia=Tarifa::where('id',0)->first();
    
      return $familia;
    }
}
