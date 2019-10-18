<?php

namespace App\Http\Controllers;

use App\{CampaignSegmento,Segmento};
use Illuminate\Http\Request;


class CampaignSegmentoController extends Controller
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
            $segmentos = $request->segmentos;
            CampaignSegmento::where('campaign_id','=',$campaign)->delete();
            $data=array();
            foreach($segmentos as $segmento){
                if(!empty($segmento)){
                    $c=Segmento::find($segmento);
                    $data[]=[
                        'campaign_id'=>$campaign,
                        'segmento_id'=>$segmento,
                        'segmento'=>$c->segmento
                    ];
                }
            }
            
            CampaignSegmento::insert($data);
          
            return response()->json(["mensaje" => $request->all()]);
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