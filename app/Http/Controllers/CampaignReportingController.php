<?php

namespace App\Http\Controllers;

use App\{Campaign, Store, CampaignPresupuesto,CampaignPresupuestoDetalle,CampaignPresupuestoExtra,VCampaignResumenElemento,VCampaignPromedio,CampaignPresupuestoPickingtransporte};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CampaignReportingController extends Controller
{
    public function index($campaignId)
    {
        $today=Carbon::now()->format('d/m/Y');
        $campaign=Campaign::find($campaignId);

        $etiquetas=Store::whereIn('id', function($q){
            $q->select('store_id')->from('campaign_elementos');})
        ->with(['campaignelementos' => function ($query) use($campaignId){
            $query->where('campaign_id',$campaignId);
            }])
        ->get();

        return view('reporting.etiquetas',compact('campaign','etiquetas','today'));
    }

    public function pdf($campaignId){
        $today=Carbon::now()->format('d/m/Y');
        $campaign=Campaign::find($campaignId);

        $etiquetas=Store::whereIn('id', function($q){
            $q->select('store_id')->from('campaign_elementos');})
        ->with(['campaignelementos' => function ($query) use($campaignId){
            $query->where('campaign_id',$campaignId);
            }])
        ->get();
        
        $pdf = \PDF::loadView('reporting.etiquetas',compact('campaign','etiquetas','today'));
        // $pdf->setPaper('a4','landscape');
        $pdf->setPaper('a4','portrait');
        // return $pdf->download('etiquetas.pdf'); así lo descarga
        return $pdf->stream(); // así lo muestra en pantalla
   }

   public function pdfPresupuesto($presupuestoId){
    $today=Carbon::now()->format('d/m/Y');
    
    $presupuesto=CampaignPresupuesto::where('id',$presupuestoId)
    ->with('campaign')
    ->first();

    $promedios=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuestoId)
    ->get();

    $totalPickingEs=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuestoId)
    ->where('zona','ES')
    ->orWhere('zona','CA')
    ->select(DB::raw('SUM(picking * stores) as picking'),DB::raw('SUM(transporte * stores) as transporte'))
    ->first();

    $totalPickingPt=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuestoId)
    ->where('zona','PT')
    ->select(DB::raw('SUM(picking * stores) as picking'),DB::raw('SUM(transporte * stores) as transporte'))
    ->first();


    $totalStores=VCampaignPromedio::where('campaign_id',$presupuesto->campaign_id)
    ->count();

    $totalStoresEs=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuesto->id)
    ->where('zona','ES')
    ->orWhere('zona','CA')
    ->sum('stores');

    $totalStoresPt=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuesto->id)
    ->where('zona','PT')
    ->sum('stores');
    
    // Info de materiales
    $totalMateriales=CampaignPresupuestoDetalle::where('presupuesto_id',$presupuesto->id)
    ->sum('total');

    $totalMaterialesEs=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuesto->id)
    ->where('zona','ES')
    ->orWhere('zona','CA')
    ->sum('totalzona');

    $totalMaterialesPt=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuesto->id)
    ->where('zona','PT')
    ->sum('totalzona');

    $materiales=VCampaignResumenElemento::where('campaign_id',$presupuesto->campaign_id)
    ->get();

    $extras=CampaignPresupuestoExtra::where('presupuesto_id',$presupuesto->id)
    ->get(); 

    $totalExtras = CampaignPresupuestoExtra::where('presupuesto_id',$presupuesto->id)
    ->sum('total');

    $totalExtrasEs=CampaignPresupuestoExtra::where('presupuesto_id',$presupuesto->id)
    ->where('zona','ES')
    ->orWhere('zona','CA')
    ->sum('total');

    $totalExtrasPt=CampaignPresupuestoExtra::where('presupuesto_id',$presupuesto->id)
    ->where('zona','PT')
    ->sum('total');    
    
    
    $pdf = \PDF::loadView('reporting.presupuesto',
        compact('presupuesto','promedios',
            'totalStores','totalMateriales',
            'materiales','extras','totalExtras',
            'totalMaterialesEs','totalMaterialesPt',
            'totalStoresEs','totalStoresPt',
            'totalPickingEs','totalPickingPt',
            'totalExtrasEs','totalExtrasPt',
            'today' ));

    // $pdf->setPaper('a4','landscape');
    $pdf->setPaper('a4','portrait');
    // return $pdf->download('etiquetas.pdf'); así lo descarga
    return $pdf->stream(); // así lo muestra en pantalla
}


}
