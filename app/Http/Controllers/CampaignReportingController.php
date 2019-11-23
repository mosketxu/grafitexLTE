<?php

namespace App\Http\Controllers;

use App\{Campaign, CampaignElemento, CampaignStore, VCampaignEtiquetaStore};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CampaignReportingController extends Controller
{
    public function index($campaignId)
    {
        $today=Carbon::now()->format('d/m/Y');
        $campaign=Campaign::find($campaignId);

        // $etiquetas=CampaignStore::where('campaign_id',$campaignId)
        //     ->with('campaignelementos')
        //     ->get();
        $etiquetas=CampaignStore::where('campaign_id',$campaignId)
            ->get();

        return view('campaign.reporting.etiquetas',compact('campaign','etiquetas','today'));
    }

    public function pdf($campaignId){
        $today=Carbon::now()->format('d/m/Y');
        $campaign=Campaign::find($campaignId);

        // $etiquetas=CampaignStore::where('campaign_id',$campaignId)
        //     ->with('campaignelementos')
        //     ->get();
        $etiquetas=CampaignStore::where('campaign_id',$campaignId)
            ->get();

        $pdf = \PDF::loadView('campaign.reporting.etiquetas',compact('campaign','etiquetas','today'));
        // $pdf->setPaper('a4','landscape');
        $pdf->setPaper('a4','portrait');
        // return $pdf->download('etiquetas.pdf'); así lo descarga
        return $pdf->stream(); // así lo muestra en pantalla
   }
}
