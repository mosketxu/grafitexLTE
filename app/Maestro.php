<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maestro extends Model
{
    use SoftDeletes;

    protected $fillable=['store','country','name','area','segmento','storeconcept','ubicacion','mobiliario','propxlemento','carteleria','medida','material','unitxprop'];

    static function scopeCampaign($query, $campaign)
    {
    //   return  $query
    //     ->whereIn('country', function ($query) use ($campaign) {
    //         $query->select('country')->from('campaign_countries')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('area', function ($query) use ($campaign) {
    //             $query->select('area')->from('campaign_areas')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('segmento', function ($query) use ($campaign) {
    //         $query->select('segmento')->from('campaign_segmentos')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('storeconcept', function ($query) use ($campaign) {
    //         $query->select('storeconcept')->from('campaign_storeconcepts')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('ubicacion', function ($query) use ($campaign) {
    //         $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('mobiliario', function ($query) use ($campaign) {
    //         $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('carteleria', function ($query) use ($campaign) {
    //         $query->select('carteleria')->from('campaign_cartelerias')->where('campaign_id', '=', $campaign);})
    //     ->whereIn('medida', function ($query) use ($campaign) {
    //         $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $campaign);})
    //     ->select('id','store','country','name','area','segmento','storeconcept','ubicacion','mobiliario',
    //         'propxelemento','carteleria','medida','material','unitxprop');
        
            return $query
            ->join('campaign_countries','campaign_countries.country','=','maestros.country')
                ->where('campaign_countries.campaign_id',$campaign)
            ->join('campaign_areas','campaign_areas.area','=','maestros.area')
                ->where('campaign_areas.campaign_id',$campaign)
            ->join('campaign_segmentos','campaign_segmentos.segmento','=','maestros.segmento')
                ->where('campaign_segmentos.campaign_id',$campaign)
            ->join('campaign_storeconcepts','campaign_storeconcepts.storeconcept','=','maestros.storeconcept')
                ->where('campaign_storeconcepts.campaign_id',$campaign)
            ->join('campaign_ubicacions','campaign_ubicacions.ubicacion','=','maestros.ubicacion')
                ->where('campaign_ubicacions.campaign_id',$campaign)
            ->join('campaign_mobiliarios','campaign_mobiliarios.mobiliario','=','maestros.mobiliario')
                ->where('campaign_mobiliarios.campaign_id',$campaign)
            ->join('campaign_cartelerias','campaign_cartelerias.carteleria','=','maestros.carteleria')
                ->where('campaign_cartelerias.campaign_id',$campaign)
            ->join('campaign_medidas','campaign_medidas.medida','=','maestros.medida')
                ->where('campaign_medidas.campaign_id',$campaign)
            ->select('maestros.store','maestros.country','maestros.name','maestros.area','maestros.segmento','maestros.storeconcept',
                'maestros.ubicacion','maestros.mobiliario','maestros.propxelemento','maestros.carteleria','maestros.medida','maestros.material',
                'maestros.unitxprop','maestros.observaciones','maestros.tanda','campaign_countries.campaign_id as campaign_id');
    

    }
    
}
