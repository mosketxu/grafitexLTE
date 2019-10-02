<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Element extends Model
{
    use SoftDeletes;

    protected $fillable=['id','element_ubicacion','element_mobiliario','element_propiedad','element_carteleria','element_medida','element_material','element_unit_x_prop','element_price'];
    protected $dates = ['deleted_at'];

}
