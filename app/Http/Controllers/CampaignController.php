<?php

namespace App\Http\Controllers;

use App\{
    Campaign,
    Store,
    CampaignStore,
    Element,
    Medida,
    CampaignMedida,
    Carteleria,
    CampaignCarteleria,
    Mobiliario,
    CampaignMobiliario,
    Ubicacion,
    CampaignUbicacion,
    Segmento,
    CampaignSegmento,
    Storeconcept,
    CampaignStoreconcept,
    Area,
    CampaignArea,
    Country,
    CampaignCountry,
};
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('campaign.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request['slug'] = Str::slug($request->campaign_name);

        $campaign = Campaign::create($request->all());

        $cont = 0;

        if ($campaignstores = $request->campaign_storeId) {
            while ($campaignstores && $cont  < count($campaignstores)) {
                $campaignstore = new CampaignStore();
                $campaignstore->campaign_id = $campaign->id;
                $campaignstore->store_id = $campaignstores[$cont];
                $campaignstore->save();
                $cont = $cont + 1;
            }
        }

        return redirect()->route('campaign.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaignEdit = Campaign::find($id);

        $storesDisponibles = Store::whereNotIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $id);
        })->get();
        $storesAsociadas = CampaignStore::where('campaign_id', '=', $id)->get();
        // dd($storesAsociadas->first());

        $medidasDisponibles = Medida::whereNotIn('id', function ($query) use ($id) {
            $query->select('medida_id')->from('campaign_medidas')->where('campaign_id', '=', $id);
        })->get();
        $medidasAsociadas = CampaignMedida::where('campaign_id', '=', $id)->get();

        $carteleriasDisponibles = Carteleria::whereNotIn('id', function ($query) use ($id) {
            $query->select('carteleria_id')->from('campaign_cartelerias')->where('campaign_id', '=', $id);
        })->get();
        $carteleriasAsociadas = CampaignCarteleria::where('campaign_id', '=', $id)->get();

        $mobiliariosDisponibles = Mobiliario::whereNotIn('id', function ($query) use ($id) {
            $query->select('mobiliario_id')->from('campaign_mobiliarios')->where('campaign_id', '=', $id);
        })->get();
        $mobiliariosAsociadas = CampaignMobiliario::where('campaign_id', '=', $id)->get();

        $ubicacionesDisponibles = Ubicacion::whereNotIn('id', function ($query) use ($id) {
            $query->select('ubicacion_id')->from('campaign_ubicacions')->where('campaign_id', '=', $id);
        })->get();
        $ubicacionesAsociadas = CampaignUbicacion::where('campaign_id', '=', $id)->get();

        $segmentosDisponibles = Segmento::whereNotIn('id', function ($query) use ($id) {
            $query->select('segmento_id')->from('campaign_segmentos')->where('campaign_id', '=', $id);
        })->get();
        $segmentosAsociadas = CampaignSegmento::where('campaign_id', '=', $id)->get();

        $storeconceptsDisponibles = Storeconcept::whereNotIn('id', function ($query) use ($id) {
            $query->select('storeconcept_id')->from('campaign_storeconcepts')->where('campaign_id', '=', $id);
        })->get();
        $storeconceptsAsociadas = CampaignStoreconcept::where('campaign_id', '=', $id)->get();

        $areasDisponibles = Area::whereNotIn('id', function ($query) use ($id) {
            $query->select('area_id')->from('campaign_areas')->where('campaign_id', '=', $id);
        })->get();
        $areasAsociadas = CampaignArea::where('campaign_id', '=', $id)->get();

        $countriesDisponibles = Country::select('id', 'country')
            ->whereNotIn('id', function ($query) use ($id) {
                $query->select('country_id')->from('campaign_countries')->where('campaign_id', '=', $id);
            })->get();
        $countriesAsociadas = CampaignCountry::join('countries', 'countries.id', '=', 'country_id')
            ->select('countries.id as id', 'countries.country as country', 'campaign_countries.id as campaigncountryid')
            ->where('campaign_id', '=', $id)
            ->get();

        // Element::whereIn('id', function ($query) use ($id) {
        //     $query->select('medida_id')->from('campaign_medidads')->where('campaign_id', '=', $id);
        // })->get();

        return view('campaign.edit', compact(
            'campaignEdit',
            'storesDisponibles',
            'storesAsociadas',
            'medidasDisponibles',
            'medidasAsociadas',
            'carteleriasDisponibles',
            'carteleriasAsociadas',
            'mobiliariosDisponibles',
            'mobiliariosAsociadas',
            'ubicacionesDisponibles',
            'ubicacionesAsociadas',
            'segmentosDisponibles',
            'segmentosAsociadas',
            'storeconceptsDisponibles',
            'storeconceptsAsociadas',
            'areasDisponibles',
            'areasAsociadas',
            'countriesDisponibles',
            'countriesAsociadas'
        ));
        // return view('campaign.edit', compact('campaignEdit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
