<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignResumen;
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
        $query = CampaignResumen::where('campaign_id',$id)
            ->select('id','store','country','name','area','segmento','storeconcept',
            'ubicacion','mobiliario','propxelemento','carteleria','medida','material','unitxprop','imagen','observaciones','precio');

        
        return datatables($query)
        ->addColumn('btn','campaign._actionsResumen')
        ->rawColumns(['btn'])
        ->make(true);
    }

}
