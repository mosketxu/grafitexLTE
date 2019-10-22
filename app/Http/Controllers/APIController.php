<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Maestro;
use Datatables;

class APIController extends Controller
{
    public function getCampaigns()
    {
        $query=Campaign::select('id','campaign_name','campaign_initdate','campaign_enddate','campaign_state','created_at','updated_at');
        return datatables($query)
        ->addColumn('btn','campaign._actions')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function getCampaignResumen($id)
    {
        $query = Maestro::select('id','store','country','name','area','segmento','storeconcept','ubicacion','mobiliario','propelemento','carteleria','medida','material','unitxprop')
        ->whereIn('country', function ($query) use ($id) {
            $query->select('country')->from('campaign_countries')->where('campaign_id', '=', $id);
        })
        ->whereIn('area', function ($query) use ($id) {
                $query->select('area')->from('campaign_areas')->where('campaign_id', '=', $id);
            })
        ->whereIn('segmento', function ($query) use ($id) {
            $query->select('segmento')->from('campaign_segmentos')->where('campaign_id', '=', $id);
        })
        ->whereIn('storeconcept', function ($query) use ($id) {
            $query->select('storeconcept')->from('campaign_storeconcepts')->where('campaign_id', '=', $id);
        })
        ->whereIn('ubicacion', function ($query) use ($id) {
            $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $id);
        })
        ->whereIn('mobiliario', function ($query) use ($id) {
            $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $id);
        })
        ->whereIn('carteleria', function ($query) use ($id) {
            $query->select('carteleria')->from('campaign_cartelerias')->where('campaign_id', '=', $id);
        })
        ->whereIn('medida', function ($query) use ($id) {
            $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $id);
        });
        
        return datatables($query)
        ->addColumn('btn','campaign._actionsResumen')
        ->rawColumns(['btn'])
        ->make(true);
    }

}
