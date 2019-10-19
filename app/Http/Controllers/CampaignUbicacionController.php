<?php

namespace App\Http\Controllers;

use App\{CampaignUbicacion, Ubicacion};
use Illuminate\Http\Request;


class CampaignUbicacionController extends Controller
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

        if ($request->ajax()) {
            $campaign = $request->campaign_id;
            $ubicaciones = $request->ubicaciones;
            CampaignUbicacion::where('campaign_id', '=', $campaign)->delete();
            $data = array();
            $contador = !is_null($request->ubicaciones);

            if (!is_null($request->ubicaciones)) {
                foreach ($ubicaciones as $ubicacion) {
                    if (!empty($ubicacion)) {
                        $c = Ubicacion::find($ubicacion);
                        $data[] = [
                            'campaign_id' => $campaign,
                            'ubicacion_id' => $ubicacion,
                            'ubicacion' => $c->ubicacion
                        ];
                    }
                }

                CampaignUbicacion::insert($data);
            }

            return response()->json([
                "mensaje" => $request->all(),
                "cont" => $contador,
            ]);
        }
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
