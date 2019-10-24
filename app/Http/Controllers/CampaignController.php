<?php

namespace App\Http\Controllers;

use App\{
    Maestro,
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
    CampaignResumen,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //
    }


    /**
     * Show the form for filtering the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filtrar($id)
    {
        $campaign = Campaign::find($id);

        $storesDisponibles = Maestro::select('store','name')->whereNotIn('store', function ($query) use ($id) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $id);
        })->groupBy('store','name')->get();
        $storesAsociadas = CampaignStore::select('store_id as store','store as name')->where('campaign_id', '=', $id)->get();

        $countriesDisponibles = Maestro::select('country')->whereNotIn('country', function ($query) use ($id) {
            $query->select('country')->from('campaign_countries')->where('campaign_id', '=', $id);
        })->groupBy('country')->get();
        $countriesAsociadas = CampaignCountry::where('campaign_id', '=', $id)->get();

        $areasDisponibles = Maestro::select('area')->whereNotIn('area', function ($query) use ($id) {
            $query->select('area')->from('campaign_areas')->where('campaign_id', '=', $id);
        })->groupBy('area')->get();
        $areasAsociadas = CampaignArea::where('campaign_id', '=', $id)->get();

        $segmentosDisponibles = Maestro::select('segmento')->whereNotIn('segmento', function ($query) use ($id) {
            $query->select('segmento')->from('campaign_segmentos')->where('campaign_id', '=', $id);
        })->groupBy('segmento')->get();
        $segmentosAsociadas = CampaignSegmento::where('campaign_id', '=', $id)->get();

        $storeconceptsDisponibles = Maestro::select('storeconcept')->whereNotIn('storeconcept', function ($query) use ($id) {
            $query->select('storeconcept')->from('campaign_storeconcepts')->where('campaign_id', '=', $id);
        })->groupBy('storeconcept')->get();
        $storeconceptsAsociadas = CampaignStoreconcept::where('campaign_id', '=', $id)->get();

        $ubicacionesDisponibles = Maestro::select('ubicacion')->whereNotIn('ubicacion', function ($query) use ($id) {
            $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $id);
        })->groupBy('ubicacion')->get();
        $ubicacionesAsociadas = CampaignUbicacion::where('campaign_id', '=', $id)->get();

        $mobiliariosDisponibles = Maestro::select('mobiliario')->whereNotIn('mobiliario', function ($query) use ($id) {
            $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $id);
        })->groupBy('mobiliario')->get();
        $mobiliariosAsociadas = CampaignMobiliario::where('campaign_id', '=', $id)->get();

        $carteleriasDisponibles = Maestro::select('carteleria')->whereNotIn('carteleria', function ($query) use ($id) {
            $query->select('carteleria')->from('campaign_cartelerias')->where('campaign_id', '=', $id);
        })->groupBy('carteleria')->get();
        $carteleriasAsociadas = CampaignCarteleria::where('campaign_id', '=', $id)->get();

        $medidasDisponibles = Maestro::select('medida')->orderBy('medida','asc')->whereNotIn('medida', function ($query) use ($id) {
            $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $id);
        })->groupBy('medida')->get();
        $medidasAsociadas = CampaignMedida::where('campaign_id', '=', $id)->get();

        return view('campaign.filtrar', compact(
            'campaign',
            'storesDisponibles','storesAsociadas','medidasDisponibles','medidasAsociadas','carteleriasDisponibles','carteleriasAsociadas',
            'mobiliariosDisponibles','mobiliariosAsociadas','ubicacionesDisponibles','ubicacionesAsociadas','segmentosDisponibles',
            'segmentosAsociadas','storeconceptsDisponibles','storeconceptsAsociadas','areasDisponibles','areasAsociadas','countriesDisponibles','countriesAsociadas'
        ));
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

    public function asociarstore(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $asociadas = $request->datoslist;
            $campo=$request->campo;
            $tabla=$request->tabla;

            DB::table($tabla)->where('campaign_id', '=', $campaign)->delete();

            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($asociadas as $asociada){
                    if(!empty($asociada)){
                        $c=json_decode($asociada);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'store_id'=>$c->store,
                            'store'=>$c->name
                        ];
                    }
                }
                DB::table($tabla)->insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }

    public function asociar(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $asociadas = $request->datoslist;
            $campo=$request->campo;
            $tabla=$request->tabla;

            DB::table($tabla)->where('campaign_id', '=', $campaign)->delete();

            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($asociadas as $asociada){
                    if(!empty($asociada)){
                        $c=json_decode($asociada);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            $campo=>$c->$campo
                        ];
                    }
                }
                DB::table($tabla)->insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }


    public function generarcampaign($id)
    {
        $campaign = Campaign::find($id);
        
        // TODO verificar si ya se ha generado la campaña. Si es así borrar todo y regenerar
        if(CampaignResumen::where('campaign_id','=',$id)->count()>0){
            CampaignResumen::where('campaign_id','=',$id)->delete();
        }

        // Si no se ha seleccionado ningun segmento entiendo que los quiero todos
        if(CampaignSegmento::where('campaign_id','=',$id)->count()==0){
            $datos=Segmento::get();
            foreach($datos as $dato){
                $campDatos=new CampaignSegmento();
                $campDatos->segmento = $dato->segmento;
                $campDatos->campaign_id = $id;
                $campDatos->save();
            }
        }
        // Si no se ha seleccionado ninguna Ubicacion entiendo que las quiero todas
        if(CampaignUbicacion::where('campaign_id','=',$id)->count()==0){
            $datos=Ubicacion::get();
            foreach($datos as $dato){
                $campDatos=new CampaignUbicacion();
                $campDatos->ubicacion = $dato->ubicacion;
                $campDatos->campaign_id = $id;
                $campDatos->save();
            }
        }
        // Si no se ha seleccionado ninguna Medida entiendo que las quiero todas
        if(CampaignMedida::where('campaign_id','=',$id)->count()==0){
            $datos=Medida::get();
            foreach($datos as $dato){
                $campDatos=new CampaignMedida();
                $campDatos->medida = $dato->medida;
                $campDatos->campaign_id = $id;
                $campDatos->save();
            }
        }
        // Si no se ha seleccionado ninguna Mobiliario entiendo que los quiero todas
        if(CampaignMobiliario::where('campaign_id','=',$id)->count()==0){
            $datos=Mobiliario::get();
            foreach($datos as $dato){
                $campDatos=new CampaignMobiliario();
                $campDatos->mobiliario = $dato->mobiliario;
                $campDatos->campaign_id = $id;
                $campDatos->save();
            }
        }

        //elijo una query en funcion de si hay Stores o no
        if(CampaignStore::where('campaign_id',$id)->count()>0){
            $resumen=Maestro::CampaignStore($id)->get();
        }
        else{
            $resumen=Maestro::Campaign($id)->get();
        }

        // relleno la tabla resultado TODO mejorar esto en lugar de hacer muchos insert hacer uno con todo a la vez
        foreach($resumen as $res){
            $campRes=new CampaignResumen;
            $campRes->store = $res->store;
            $campRes->country = $res->country;
            $campRes->name = $res->name;
            $campRes->area = $res->area;
            $campRes->segmento = $res->segmento;
            $campRes->storeconcept = $res->storeconcept;
            $campRes->ubicacion = $res->ubicacion;
            $campRes->mobiliario = $res->mobiliario;
            $campRes->propxelemento = $res->propxelemento;
            $campRes->carteleria = $res->carteleria;
            $campRes->medida = $res->medida;
            $campRes->material = $res->material;
            $campRes->unitxprop = $res->unitxprop;
            $campRes->observaciones = $res->observaciones;
            $campRes->tanda = $res->tanda;
            $campRes->campaign_id = $id;
            $campRes->save();
        }

        return redirect()->route('campaign.resumen', [$campaign]);
    }

    public function resumen($campaignId)
    {
        $campaign = Campaign::find($campaignId);
        // consulta de contadores

        // $contadores = DB::table('campaign_resumenes')
        //          ->select('segmento', DB::raw('count(*) as totalS'))
        //          ->groupBy('segmento')
        //          ->get();
        return view('campaign.resumen', compact('campaign'))->with('notice', 'Generación realizada satisfactoriamente.');    
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
