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
        //
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
            'uxprop' => 'required|numeric',
            ]);
        // dd($request);
        CampaignPresupuestoDetalle::find($id)->update($request->all());
        $totalMateriales = CampaignPresupuestoDetalle::where('presupuesto_id',$request->presupuesto_id)->sum('total');
            // dd($totalMateriales);

        return response()->json([
            "mensaje" => $request->all(),
            "tot"=>$totalMateriales,
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
        //
    }
}
