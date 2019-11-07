<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class CampaignPresupuesto extends Model
{
    use SoftDeletes;

    protected $fillable=['campaign_id','referencia','fecha','version','atencion','ambito','observaciones','estado'];

    public function scopeSearch($query, $busca)
    {
        return $query->where('referencia', 'LIKE', "%$busca%")
            ->orWhere('fecha', 'LIKE', "%$busca%")
            ->orWhere('atencion', 'LIKE', "%$busca%")
            ->orWhere('ambito', 'LIKE', "%$busca%")
            ->orWhere('observaciones', 'LIKE', "%$busca%")
            ->orWhere('estado', 'LIKE', "%$busca%")
            ;
    }
  

    public function campaign(){
    return $this->belongsTo(Campaign::class);
    }

    public function presupuestoextras(){
    return $this->hasMany(CampaignPresupuestoExtra::class);
    }

    public function materiales(){
        return $this->hasMany(CampaignPresupuestoMaterial::class);
    }

    public function pickings(){
        return $this->hasMany(CampaignPresupuestoPicking::class);
    }

    public function promedios(){
        return $this->hasMany(CampaignPresupuestoPromedio::class);
    }

}
