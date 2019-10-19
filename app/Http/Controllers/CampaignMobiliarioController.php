<?php

namespace App\Http\Controllers;

use App\{CampaignMobiliario,Mobiliario};
use Illuminate\Http\Request;


class CampaignMobiliarioController extends Controller
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
            $mobiliarios = $request->mobiliarios;
            CampaignMobiliario::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->mobiliarios);

            if(!is_null($request->mobiliarios)){            
                foreach($mobiliarios as $mobiliario){
                    if(!empty($mobiliario)){
                        $c=Mobiliario::find($mobiliario);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'mobiliario_id'=>$mobiliario,
                            'mobiliario'=>$c->mobiliario
                        ];
                    }
                }
            
                CampaignMobiliario::insert($data);
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