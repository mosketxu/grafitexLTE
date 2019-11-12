<?php

namespace App\Http\Controllers;

use App\CampaignPresupuestoDetalle;
use Illuminate\Http\Request;


class CampaignPresupuestoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'concepto' => 'required',
            'unidades' => 'required|numeric',
            'preciounidad' => 'required|numeric',
            ]);
        // dd($request);

        $detalle = new CampaignPresupuestoDetalle;

        $detalle->presupuesto_id = $request->presupuesto_id;
        $detalle->concepto = $request->concepto;
        $detalle->tipo = $request->tipo;
        $detalle->preciounidad = $request->preciounidad;
        $detalle->uxprop=0;
        $detalle->unidades = $request->unidades;
        $detalle->total = $request->total;
        $detalle->observaciones = $request->observaciones;

        $detalle->save();

        // return response()->json([
        //     "mensaje" => $request->all(),
        //     'notification'=> '¡Línea añadida satisfactoriamente!',
        //     ]);

        $notification = array(
            'message' => '¡Concepto añadido satisfactoriamente!',
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
        //
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
        $request->validate([
            'concepto' => 'required',
            'unidades' => 'required|numeric',
            'preciounidad' => 'required|numeric',
            ]);
        // dd($request);
        CampaignPresupuestoDetalle::find($id)->update($request->all());
        $totalDetalles = CampaignPresupuestoDetalle::where('presupuesto_id',$request->presupuesto_id)
        ->where('tipo',$request->tipo)
        ->sum('total');
            // dd($totalMateriales);

        return response()->json([
            "mensaje" => $request->all(),
            "tot"=>$totalDetalles,
            'notification'=> '¡Línea actualizada satisfactoriamente!',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CampaignPresupuestoDetalle::find($id)->delete();

        $notification = array(
            'message' => '¡Concepto eliminado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
