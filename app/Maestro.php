<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Maestro extends Model
{
    use SoftDeletes;

    protected $fillable=['store','country','name','area','segmento','storeconcept','ubicacion','mobiliario','propxelemento','carteleria','medida','material','unitxprop'];

    // protected $guarded = [];

    static function scopeCampaignStore($query, $campaign)
    {
        return $query
        ->whereIn('store', function ($query) use ($campaign) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $campaign);})
        ->whereIn('segmento', function ($query) use ($campaign) {
            $query->select('segmento')->from('campaign_segmentos')->where('campaign_id', '=', $campaign);})
        ->whereIn('ubicacion', function ($query) use ($campaign) {
            $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $campaign);})
        ->whereIn('mobiliario', function ($query) use ($campaign) {
            $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $campaign);})
        ->whereIn('medida', function ($query) use ($campaign) {
            $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $campaign);})
        ->select('maestros.store','maestros.country','maestros.name','maestros.area','maestros.segmento','maestros.storeconcept',
            'maestros.ubicacion','maestros.mobiliario','maestros.propxelemento','maestros.carteleria','maestros.medida','maestros.material',
            'maestros.unitxprop','maestros.observaciones', DB::raw($campaign.' as campaign_id'));
    }

    static function insertStores()
    {
        $stores=Maestro::select('store','name','country','area','segmento','storeconcept')
        ->groupBy('store','name','country','area','segmento','storeconcept')
        ->get();

        // dd($stores);
        foreach (array_chunk($stores->toArray(),1000) as $t){
            $dataSet = [];
            // foreach ($stores as $store) {
            foreach ($t as $store) {
                $dataSet[] = [
                    'id'  => $store['store'],
                    'name'  => $store['name'],
                    'country'=>$store['country'],
                    'area'=>$store['area'],
                    'segmento'=>$store['segmento'],
                    'concept'=>$store['storeconcept']
                ];
            }
            DB::table('stores')->insert($dataSet);
        }
        return true;
    }

    
}
