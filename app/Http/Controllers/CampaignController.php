<?php

namespace App\Http\Controllers;

use App\{
    Maestro,
    Campaign,
    CampaignStore,
    CampaignMedida,
    CampaignCarteleria,
    CampaignMobiliario,
    CampaignUbicacion,
    CampaignSegmento,
    CampaignStoreconcept,
    CampaignArea,
    CampaignCountry,
    CampaignElemento,
    CampaignGaleria,
    VCampaignGaleria,
    TarifaFamilia,
};
use App\Exports\CampaignExport;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('campaign.index');
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
        $campaign = Campaign::create($request->all());

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
        $campaign=Campaign::find($id);
        return view('campaign.edit',compact('campaign'));
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
    public function update(Request $request,$id)
    {
        $request->validate([
            'campaign_name' => 'required',
            'campaign_initdate' => 'required',
            'campaign_enddate' => 'required',
            'campaign_state' => 'required',
        ]);

        Campaign::find($id)->update($request->all());

        return redirect()->route('campaign.index')->with('success','Registro actualizado satisfactoriamente');
    }
    public function export() 
{
        return Excel::download(new CampaignExport, 'campaign.xlsx');
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

        // Verifico si ya se ha generado la campaña. Si es así borrar todo lo generado y regenerar
        if(CampaignElemento::where('campaign_id','=',$id)->count()>0){
            CampaignElemento::where('campaign_id','=',$id)->delete();
        }

        if(CampaignGaleria::where('campaign_id','=',$id)->count()>0){
            CampaignGaleria::where('campaign_id','=',$id)->delete();
        }

        //Filtros
        // Si no se ha seleccionado ningun Area entiendo que los quiero todos
        if(CampaignArea::where('campaign_id','=',$id)->count()==0){
            $areas=Maestro::select('area')->groupBy('area')->get();
            Campaign::inserta('campaign_areas',$areas,'area',$id);
        }
        // Si no se ha seleccionado ningun Medida entiendo que los quiero todos
        if(CampaignMedida::where('campaign_id','=',$id)->count()==0){
            $medidas=Maestro::select('medida')->groupBy('medida')->get();
            Campaign::inserta('campaign_medidas',$medidas,'medida',$id);
        }
        // Si no se ha seleccionado ningun Mobiliario entiendo que los quiero todos
        if(CampaignMobiliario::where('campaign_id','=',$id)->count()==0){
            $mobiliarios=Maestro::select('mobiliario')->groupBy('mobiliario')->get();
            Campaign::inserta('campaign_mobiliarios',$mobiliarios,'mobiliario',$id);
        }
        // Si no se ha seleccionado ningun segmento entiendo que los quiero todos
        if(CampaignSegmento::where('campaign_id','=',$id)->count()==0){
            $segmentos=Maestro::select('segmento')->groupBy('segmento')->get();
            Campaign::inserta('campaign_segmentos',$segmentos,'segmento',$id);
        }
        // Si no se ha seleccionado ningun ubicacion entiendo que los quiero todos
        if(CampaignUbicacion::where('campaign_id','=',$id)->count()==0){
            $ubicacions=Maestro::select('ubicacion')->groupBy('ubicacion')->get();
            Campaign::inserta('campaign_ubicacions',$ubicacions,'ubicacion',$id);
        }
        // Si no se ha seleccionado ningun store entiendo que los quiero todos
        if(CampaignStore::where('campaign_id','=',$id)->count()==0){
            $stores=Maestro::select('store','name')
            ->groupBy('store','name')
            ->get();
            foreach (array_chunk($stores->toArray(),1000) as $t){
                $dataSet = [];
                // foreach ($stores as $store) {
                foreach ($t as $store) {
                    $dataSet[] = [
                        'campaign_id'  => $id,
                        'store_id'  => $store->store,
                        'store'  => $store->name,
                    ];
                }
                DB::table('campaign_stores')->insert($dataSet);
            }
        }

        
        //recupero todos los elementos elegidos y los inserto
        $generar=Maestro::CampaignStore($id)->get();

        foreach (array_chunk($generar->toArray(),100) as $t){
            $dataSet = [];
            foreach ($t as $gen) {
                if ($gen['country']=='PT'){
                    $zona='PT';
                }
                else{
                    if($gen['area']=='Canarias')
                        $zona='CA';
                    else
                        $zona='ES';
                }

                // busco a que familia pertenece el elemento para poder cotizar después                
                $familia=TarifaFamilia::getFamilia($gen['material'],$gen['medida']);
                $fam=$familia['id'];

                if (is_null($fam))
                    $fam=1;
                
                $dataSet[] = [
                    'campaign_id'  => $id,
                    // 'store_id'  => $campStoreId->id,
                    'store_id'  => $gen['store'],
                    'name'  => $gen['name'],
                    'country'  => $gen['country'],
                    'area'  => $gen['area'],
                    'zona'  => $zona,
                    'segmento'  => $gen['segmento'],
                    'storeconcept'  => $gen['storeconcept'],
                    'ubicacion'  => $gen['ubicacion'],
                    'mobiliario'  => $gen['mobiliario'],
                    'propxelemento'  => $gen['propxelemento'],
                    'carteleria'  => $gen['carteleria'],
                    'medida'  => $gen['medida'],
                    'material'  => $gen['material'],
                    'familia'=>$fam,
                    'unitxprop'  => $gen['unitxprop'],
                    'imagen'  => str_replace('.','',str_replace(')','',str_replace('(','',str_replace('-','',str_replace(' ','',$gen['mobiliario'].'-'.$gen['carteleria'].'-'.$gen['medida']))))).'.jpg',
                ];
            }

            // print_r($dataSet);die(); //luego View Source
            DB::table('campaign_elementos')->insert($dataSet);
        }
        
        //relleno la tabla imagenes
        $imagenes=VCampaignGaleria::getGaleria($id);
        foreach (array_chunk($imagenes->toArray(),1000) as $t){
            $dataSet = [];
            foreach ($t as $gen) {
                $dataSet[] = [
                    'campaign_id'  => $id,
                    'mobiliario'  => $gen['mobiliario'],
                    'carteleria'  => $gen['carteleria'],
                    'medida'  => $gen['medida'],
                    'elemento'  => $gen['elemento'],
                    'eci'  => $gen['ECI'],
                    'imagen'  => $gen['imagen'],
                ];
            }
            DB::table('campaign_galerias')->insert($dataSet);
        }

        return redirect()->route('campaign.elementos', $campaign);
    }

    public function conteo($campaignId, Request $request) 
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        } 
    
        $campaign = Campaign::find($campaignId);
        $total=CampaignElemento::where('campaign_id',$campaignId)->count();
        $totalstores=CampaignElemento::distinct('store_id')->where('campaign_id',$campaignId)->count('store_id');
        
        $conteodetallado=CampaignElemento::search($request->busca)
            ->where('campaign_id',$campaignId)
            ->select('segmento','ubicacion','medida','mobiliario','area','material', DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('segmento','ubicacion','medida','mobiliario','area','material')
            ->paginate('50');

        // $totalElementos=CampaignElemento::where('campaign_id',$campaignId)->count();

        $conteostoresAreaCountry=CampaignElemento::distinct('store_id')->where('campaign_id',$campaignId)
        ->select('country','area',DB::raw('count(*) as totales'))
        ->groupBy('country','area')
        ->get();
        
        $conteoCountryAreaSegmentoConcept= CampaignElemento::where('campaign_id',$campaignId)
        ->select('country','area','segmento','storeconcept', DB::raw('count(*) as totales'))
        ->groupBy('country','area','segmento','storeconcept')
        ->get();
        
        // $conteoMateriales=Campaign::getConteoMaterial($campaignId);

        return view('campaign.conteos', compact('campaign','conteodetallado','conteostoresAreaCountry','total','totalstores','busqueda'))
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
        Campaign::where('id',$id)->delete();


         $notification = array(
            'message' => '¡Campaña eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
