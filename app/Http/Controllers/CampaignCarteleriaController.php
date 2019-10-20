<?php

namespace App\Http\Controllers;

use App\{CampaignCarteleria,Carteleria};
use Illuminate\Http\Request;


class CampaignCarteleriaController extends Controller
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
    public function store(Request $request){

        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $cartelerias = $request->datoslist;
            CampaignCarteleria::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($cartelerias as $carteleria){
                    if(!empty($carteleria)){
                        $c=Carteleria::find($carteleria);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'carteleria_id'=>$carteleria,
                            'carteleria'=>$c->carteleria
                        ];
                    }
                }
                CampaignCarteleria::insert($data);
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