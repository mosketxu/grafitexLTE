<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'id','name','country',
        'zona','area_id','area','segmento',
        'concepto_id','concepto','observaciones','imagen'];

    public function scopeSearch($query, $busca)
    {
      return $query->where('id', 'LIKE', "%$busca%")
      ->orWhere('name', 'LIKE', "%$busca%")
      ->orWhere('country', 'LIKE', "%$busca%")
      ->orWhere('zona', 'LIKE', "%$busca%")
      ->orWhere('area', 'LIKE', "%$busca%")
      ->orWhere('segmento', 'LIKE', "%$busca%")
      ->orWhere('concepto', 'LIKE', "%$busca%")
      ->orWhere('observaciones', 'LIKE', "%$busca%")
      ->orWhere('imagen', 'LIKE', "%$busca%")
      ;
    }

    public function are()  
    {
        return $this->belongsTo(Area::class,'area_id');
    }


    public function concep()  
    {
        return $this->belongsTo(Storeconcept::class,'concepto_id');
    }



}
