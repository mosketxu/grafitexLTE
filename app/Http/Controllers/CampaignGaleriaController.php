<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignGaleria;
use Image;
use Illuminate\Http\Request;


class CampaignGaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($campaignId)
    {
        $campaign=Campaign::find($campaignId);
        $campaigngaleria=CampaignGaleria::where('campaign_id',$campaignId)->get();

        // dd($campaign);

        return view('campaign.galeria.index',compact('campaign','campaigngaleria'));
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
    public function edit($campaignId,$imagenId)
    {
        $campaign=Campaign::find($campaignId);
        $campaigngaleria=CampaignGaleria::where('id',$imagenId)->first();

        return view('campaign.galeria.edit',compact('campaign','campaigngaleria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request);
        $extension=$request->file('photo')->getClientOriginalExtension();
        $file_name=$request->elemento.'-'.$request->campaign_id.'.'.$extension;
        Image::make($request->file('photo'))
            ->resize(144,144)
            ->save('storage/galeria/'.$file_name);

        $campaigngaleria=CampaignGaleria::find($request->idcampaigngaleria);
        $campaigngaleria->imagen = $file_name;
        $campaigngaleria->save();

        return back()
            ->with('success', 'You have successfully upload image.');
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
