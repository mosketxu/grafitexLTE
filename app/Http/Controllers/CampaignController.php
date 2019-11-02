<?php

namespace App\Http\Controllers;

use App\{
    Maestro,
    Campaign,
    Store,
    CampaignStore,
    Medida,
    CampaignMedida,
    CampaignCarteleria,
    Mobiliario,
    CampaignMobiliario,
    Ubicacion,
    CampaignUbicacion,
    Segmento,
    CampaignSegmento,
    CampaignStoreconcept,
    CampaignArea,
    CampaignCountry,
    CampaignElemento,
    CampaignGaleria
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if(CampaignElemento::where('campaign_id','=',$id)->count()>0){
            CampaignElemento::where('campaign_id','=',$id)->delete();}
        if(CampaignGaleria::where('campaign_id','=',$id)->count()>0){
            CampaignGaleria::where('campaign_id','=',$id)->delete();}
        // Si no se ha seleccionado ningun segmento entiendo que los quiero todos
        if(CampaignSegmento::where('campaign_id','=',$id)->count()==0){
            CampaignSegmento::insert(Segmento::get()->toArray);}
        // Si no se ha seleccionado ninguna Ubicacion entiendo que las quiero todas
        if(CampaignUbicacion::where('campaign_id','=',$id)->count()==0){
            CampaignUbicacion::insert(Ubicacion::get()->toArray());}
        // Si no se ha seleccionado ninguna Medida entiendo que las quiero todas
        if(CampaignMedida::where('campaign_id','=',$id)->count()==0){
            CampaignMedida::insert(Medida::get()->toArray());}
        // Si no se ha seleccionado ningun Mobiliario entiendo que los quiero todas
        if(CampaignMobiliario::where('campaign_id','=',$id)->count()==0){
            CampaignMobiliario::insert(Mobiliario::get()->toArray());}
            
        //elijo una query en funcion de si hay Stores o no y Relleno la tabla elementos
        if(CampaignStore::where('campaign_id',$id)->count()>0){
            $generar=Maestro::CampaignStore($id)->get();}
        else{
            $generar=Maestro::Campaign($id)->get();
        }
        
        $campaignelemento=new CampaignElemento;

        foreach (array_chunk($generar->toArray(),1000) as $t){
            $dataSet = [];
            foreach ($generar as $gen) {
                $dataSet[] = [
                    'campaign_id'  => $id,
                    'store'  => $gen->store,
                    'name'  => $gen->name,
                    'country'  => $gen->country,
                    'area'  => $gen->area,
                    'segmento'  => $gen->segmento,
                    'storeconcept'  => $gen->storeconcept,
                    'ubicacion'  => $gen->ubicacion,
                    'mobiliario'  => $gen->mobiliario,
                    'propxelemento'  => $gen->propxelemento,
                    'carteleria'  => $gen->carteleria,
                    'medida'  => $gen->medida,
                    'material'  => $gen->material,
                    'unitxprop'  => $gen->unitxprop,
                    'imagen'  => str_replace('.','',str_replace(')','',str_replace('(','',str_replace('-','',str_replace(' ','',$gen->mobiliario.'-'.$gen->carteleria.'-'.$gen->medida))))).'.jpg',
                ];
            }
            DB::table('campaign_elementos')->insert($dataSet);
        }

        //relleno la tabla imagenes
        $imagenes=CampaignElemento::where('campaign_id',$id)
        ->distinct('campaign_id','mobiliario','carteleria','medida')
        ->select('campaign_id',DB::raw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT(mobiliario,carteleria,medida),' ',''),'.',''),'(',''),')',''),'+','') as elemento"))
        ->get();

        foreach (array_chunk($imagenes->toArray(),1000) as $t){
            CampaignGaleria::insert($t);}
        
        return redirect()->route('campaign.elementos', $campaign);
    }

    public function elementos($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        $elementos= CampaignElemento::where('campaign_id',$campaignId)
        ->select('mobiliario','propxelemento','carteleria','medida','material',DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('mobiliario','propxelemento','carteleria','medida','material')
        ->get();

        return view('campaign.elementos', compact('campaign','elementos'))->with('notice', 'Generación realizada satisfactoriamente.');    
    }

    public function conteo($campaignId)
    {
        $campaign = Campaign::find($campaignId);
        $total=CampaignElemento::where('campaign_id',$campaignId)->count();
        $totalstores=CampaignElemento::distinct('store')->where('campaign_id',$campaignId)->count('store');
        
        $conteostoresAreaCountry=CampaignElemento::distinct('store')->where('campaign_id',$campaignId)
        ->select('country','area',DB::raw('count(*) as totales'))
        ->groupBy('country','area')
        ->get();

        
        $conteoCountryAreaSegmentoConcept= CampaignElemento::where('campaign_id',$campaignId)
        ->select('country','area','segmento','storeconcept', DB::raw('count(*) as totales'))
        ->groupBy('country','area','segmento','storeconcept')
        ->get();
        
        $conteoMateriales=CampaignElemento::where('campaign_id',$campaignId)
        ->select('material',DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
        ->groupBy('material')
        ->get();
 
        // return view('campaign.conteo', compact('campaign','conteoStores','conteostoresAreaCountry','conteoCountryAreaSegmentoConcept','conteoMateriales','total'))
        //     ->with('notice', 'Generación realizada satisfactoriamente.');    
        
        return view('campaign.conteos', compact('campaign','conteostoresAreaCountry','total','totalstores'))
            ->with('notice', 'Generación realizada satisfactoriamente.');    
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
