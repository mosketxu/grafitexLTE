<?php

namespace App\Http\Controllers;

use App\{Campaign, CampaignElemento, CampaignPresupuesto, CampaignPresupuestoDetalle, CampaignPresupuestoExtra,VCampaignPromedio, VCampaignResumenElemento, VCampaignAreaStore};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignPresupuestoController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, $campaignId)
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        } 
        $campaign = Campaign::find($campaignId);

        $presupuestos= CampaignPresupuesto::search($request->busca)
            ->where('campaign_id',$campaignId)
            ->orderBy('fecha')
            ->paginate('50');
        
        return view('campaign.presupuesto.index', compact('presupuestos','campaign','busqueda'));    
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
        $request->validate([
            'referencia' => 'required',
            'version' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required',
            ]);
            
        $campaign = Campaign::find($request->campaign_id);

        // recupero la lista de elementos creada y asigno el precio en función de cuántos hay
        // calculo el total actual de los elementos para insertarlo y mostrarlo en el indice de prepuestos
        // Lo hago cada vez que genero un presupuesto para tener siempre el último precio
        $totalpresupuesto= CampaignElemento::asignElementosPrecio($request->campaign_id);

        
        $campPresu=CampaignPresupuesto::create($request->all());
        $campPresu->total=$totalpresupuesto->total;
        $campPresu->save();

        // guardo los materiales en campaign_presupuestos_detalle para tener historico si se cambian los precios en una segunda versión del presupuesto
        $materiales=VCampaignResumenElemento::where('campaign_id',$request->campaign_id)
        ->get();
        if($materiales->count()>0){
            foreach (array_chunk($materiales->toArray(),1000) as $t){
                $dataSet = [];
                foreach ($t as $material) {
                    $dataSet[] = [
                        'presupuesto_id'  => $campPresu->id,
                        'familia'  => $material['familia'],
                        'precio'  => $material['precio'],
                        'unidades'  => $material['unidades'],
                        'total'  => $material['tot'],
                    ];
                }
                DB::table('campaign_presupuesto_detalles')->insert($dataSet);
            }
        }
        
        $notification = array(
            'message' => '¡Presupuesto creado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
        $campaignpresupuesto=CampaignPresupuesto::find($id); 
        $campaign=Campaign::find($campaignpresupuesto->campaign_id);
        $materiales=CampaignPresupuestoDetalle::where('presupuesto_id',$campaignpresupuesto->id)->get();
        
        return view('campaign.presupuesto.edit',compact('campaign','materiales','campaignpresupuesto'));
    }

    public function cotizacion($id)
    {
        $campaignpresupuesto=CampaignPresupuesto::find($id);
        $campaign=Campaign::find($campaignpresupuesto->campaign_id);
        
        // Info de promedios
        $promedios=VCampaignPromedio::where('campaign_id',$campaignpresupuesto->campaign_id)
        ->select('zona',DB::raw('SUM(tot) as total'),DB::raw('count(*) as stores'))
        ->groupBy('zona')
        ->get(); 
        
        $totalStores=VCampaignPromedio::where('campaign_id',$campaignpresupuesto->campaign_id)
        ->count();
        
        // Info de materiales
        $totalMateriales=CampaignPresupuestoDetalle::where('presupuesto_id',$id)
        ->sum('total');
        
        $materiales=VCampaignResumenElemento::where('campaign_id',$campaignpresupuesto->campaign_id)
        ->get();

        $extras=CampaignPresupuestoExtra::where('presupuesto_id',$campaignpresupuesto->id)
        ->get(); 

        $totalExtras = CampaignPresupuestoExtra::where('presupuesto_id',$campaignpresupuesto->id)
        ->sum('total');

        return view('campaign.presupuesto.cotizacion',
            compact(
                'campaign','campaignpresupuesto',
                'promedios','totalMateriales','totalStores',
                'materiales',
                'extras','totalExtras'
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
        // if ($request->ajax()) {
            $request->validate([
                'referencia' => 'required',
                'version' => 'required',
                'fecha' => 'required|date',
                'estado' => 'required',
                ]);
            CampaignPresupuesto::find($id)->update($request->all());
            $campaign=Campaign::find($request->campaign_id);
                
            $notification = array(
                'message' => '¡Presupuesto actualizado satisfactoriamente!',
                'alert-type' => 'success'
            );
                
            return redirect()->back()->with($notification);
        }
    // }

    public function refresh($campaignId,$presupuestoId)
    {
        
        // elimino los detalles del presupuesto para poner nuevos precios
        $detallePresup=CampaignPresupuestoDetalle::where('presupuesto_id',$presupuestoId)->count();
        if ($detallePresup>0)
            CampaignPresupuestoDetalle::where('presupuesto_id',$presupuestoId)->delete();

        // $campaign = Campaign::find($campaignid);

        // recupero la lista de elementos creada y asigno el precio en función de cuántos hay
        // calculo el total actual de los elementos para insertarlo y mostrarlo en el indice de prepuestos
        // Lo hago cada vez que genero un presupuesto para tener siempre el último precio
        $totalpresupuesto= CampaignElemento::asignElementosPrecio($campaignId);
        
        

        // guardo los materiales en campaign_presupuestos_detalle para tener historico si se cambian los precios en una segunda versión del presupuesto
        $materiales=VCampaignResumenElemento::where('campaign_id',$campaignId)
        ->get();
        if($materiales->count()>0){
            foreach (array_chunk($materiales->toArray(),1000) as $t){
                $dataSet = [];
                foreach ($t as $material) {
                    $dataSet[] = [
                        'presupuesto_id'  => $presupuestoId,
                        'familia'  => $material['familia'],
                        'precio'  => $material['precio'],
                        'unidades'  => $material['unidades'],
                        'total'  => $material['tot'],
                    ];
                }
                DB::table('campaign_presupuesto_detalles')->insert($dataSet);
            }
        }
        
        $notification = array(
            'message' => '¡Nuevos precios asociados satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CampaignPresupuesto::find($id)->delete();

        return response()->json(['success'=>'Eliminado con exito']);
    }
}
