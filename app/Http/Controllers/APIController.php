<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\{CampaignResumen,CampaignContador};

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
            'ubicacion','mobiliario','propxelemento','carteleria','medida','material','unitxprop','imagen','observaciones','precio')
            ->orderByRaw('segmento ASC,ubicacion ASC,medida ASC,mobiliario ASC,area ASC,material ASC');

        
        return datatables($query)
        ->addColumn('btn','campaign._actionsResumen')
        ->rawColumns(['btn'])
        ->make(true);
    }


    public function getCampaignContador($id)
    {
        // $query = CampaignResumen::where('campaign_id',$id)
        //     ->select('segmento','ubicacion','medida','mobiliario','area','material', DB::raw('count(*) as total'))
        //     ->groupBy('segmento','ubicacion','medida','mobiliario','area','material');

        $query = CampaignContador::where('campaign_id',$id)
            ->select('segmento','ubicacion','medida','mobiliario','area','material','totales','unidades');
        
        return datatables($query)
        ->addColumn('btn','campaign._actionsResumen')
        ->rawColumns(['btn'])
        ->make(true);
    }


}
