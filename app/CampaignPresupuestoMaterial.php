<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPresupuestoMaterial extends Model
{
    protected $table = "campaign_presupuesto_materiales";
    protected $fillable=['presupuesto_id','concepto','preciounidad','unidades','total','observaciones'];

    public function campaignpresupuesto(){
        return $this->belongsTo(CampaignPresupuesto::class);
    }

}
