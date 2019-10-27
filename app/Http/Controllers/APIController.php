<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\{CampaignElemento,CampaignContador};
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function getCampaigns(){
        $query=Campaign::select('id','campaign_name','campaign_initdate','campaign_enddate','campaign_state','created_at','updated_at');
        return datatables($query)
        ->addColumn('btn','campaign._actions')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function getCampaignElementos($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('id','store','country','name','area','segmento','storeconcept',
            'ubicacion','mobiliario','propxelemento','carteleria','medida','material','unitxprop','imagen','observaciones','precio')
            ->orderByRaw('segmento ASC,ubicacion ASC,medida ASC,mobiliario ASC,area ASC,material ASC');
        
        return datatables($query)
        ->addColumn('btn','campaign._actionsElementos')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function getCampaignDetalles($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('segmento','ubicacion','medida','mobiliario','area','material', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('segmento','ubicacion','medida','mobiliario','area','material');
        
        return datatables($query)
        ->make(true);
    }
    
    public function getCampaignStores($id){
        $query = CampaignElemento::distinct('store')->where('campaign_id',$id)
            ->select('country','area', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('country','area');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignMateriales($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('material', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('material');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignSegmentos($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('segmento', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('segmento');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignStoreConcepts($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('storeconcept', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('storeconcept');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignMobiliarios($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('mobiliario', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('mobiliario');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignPropxelementos($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('propxelemento', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('propxelemento');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignCartelerias($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('carteleria', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('carteleria');
        
        return datatables($query)
        ->make(true);
    }
    public function getCampaignMedidas($id){
        $query = CampaignElemento::where('campaign_id',$id)
            ->select('medida', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('medida');
        
        return datatables($query)
        ->make(true);
    }

}