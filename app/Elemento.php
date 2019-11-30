<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = "elementos"; 
    protected $fillable=[
        'elementificador',
        'ubicacion_id','ubicacion',
        'mobiliario_id','mobiliario',
        'propxelemento_id','propxelemento',
        'carteleria_id','carteleria',
        'medida_id','medida',
        'material_id','material',
        'unitxprop_id','unitxprop',
        ];

    public function storeelementos()  
    {
        return $this->hasMany(StoreElemento::class);
    }
    
}
