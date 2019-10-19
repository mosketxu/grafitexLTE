<?php

namespace App\Http\Controllers;

use App\{CampaignCountry,Country};
use App\Http\Requests\CampaignCountryRequest; 
use Illuminate\Http\Request;


class CampaignCountryController extends Controller
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
    public function store(CampaignCountryRequest $request){

        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $countries = $request->countries;
            CampaignCountry::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->countries);

            if(!is_null($request->countries)){
                foreach($countries as $country){
                    if(!empty($country)){
                        $c=Country::find($country);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'country_id'=>$country,
                            'country'=>$c->country
                        ];
                    }
                }
                
                CampaignCountry::insert($data);
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