<?php

namespace App\Http\Controllers;

use App\{Campaign, CampaignElemento, CampaignPresupuesto, CampaignPresupuestoDetalle,CampaignPaisStore};
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

        $campPresu=CampaignPresupuesto::create($request->all());

        //Recupero el conteo por material y lo inserto en la tabla campaign_presupuestos_materiales
        $conteoMateriales=Campaign::getConteoMaterial($request->campaign_id);
        foreach (array_chunk($conteoMateriales->toArray(),100) as $t){
            $dataSet = [];
            foreach ($t as $dato) {
                $dataSet[] = [
                    'presupuesto_id'  => $campPresu->id,
                    'tipo'=>0,
                    'concepto'  => $dato['material'],
                    'unidades'  => $dato['totales'],
                    'uxprop'  => $dato['unidades'],
                ];
            }
            DB::table('campaign_presupuesto_detalles')->insert($dataSet);
        }

        $notification = array(
            'message' => '¡Presupuesto actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        // return redirect()->route('campaign.presupuesto',$campaign)->with($notification);
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
        $materiales=CampaignPresupuestoDetalle::where('presupuesto_id',$campaignpresupuesto->id)->get(); //ya están agrupados aquí
        $totalMateriales = CampaignPresupuestoDetalle::where('presupuesto_id',$campaignpresupuesto->id)->sum('total');

        $paisStores=Campaign::getConteoPaisStores($campaignpresupuesto->campaign_id); //hay que agrupar
        $totalPaisStores=CampaignPaisStore::where('campaign_id',$campaignpresupuesto->campaign_id)->count();

        return view('campaign.presupuesto.cotizacion',compact('campaign','materiales','campaignpresupuesto','totalMateriales','paisStores','totalPaisStores'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        CampaignPresupuesto::find($id)->delete();

        // $notification = array(
        //     'message' => '¡Presupuesto eliminado satisfactoriamente!',
        //     'alert-type' => 'success' 
        // );
  
        // return redirect()->back()->with($notification);

        return response()->json(['success'=>'Eliminado con exito']);
    }


}
