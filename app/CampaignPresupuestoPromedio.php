<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPresupuestoPromedio extends Model
{
    protected $fillable=['presupuesto_id','concepto','preciounidad','unidades','total','observaciones'];

    public function campaignpresupuesto(){
        return $this->belongsTo(CampaignPresupuesto::class);
    }

}
