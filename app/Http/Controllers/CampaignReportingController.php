<?php

namespace App\Http\Controllers;

use App\{Campaign, Store, CampaignStore};
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

        return view('campaign.reporting.etiquetas',compact('campaign','etiquetas','today'));
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
        
        $pdf = \PDF::loadView('campaign.reporting.etiquetas',compact('campaign','etiquetas','today'));
        // $pdf->setPaper('a4','landscape');
        $pdf->setPaper('a4','portrait');
        // return $pdf->download('etiquetas.pdf'); así lo descarga
        return $pdf->stream(); // así lo muestra en pantalla
   }
}
