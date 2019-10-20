<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{CampaignMedida,Medida};

class CampaignMedidaController extends Controller
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
            $campaign=$request->campaign_id;
            $medidas = $request->datoslist;
            CampaignMedida::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($medidas as $medida){
                    if(!empty($medida)){
                        $c=Medida::find($medida);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'medida_id'=>$medida,
                            'medida'=>$c->medida
                        ];
                    }
                }
            
                CampaignMedida::insert($data);
            }          
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
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
