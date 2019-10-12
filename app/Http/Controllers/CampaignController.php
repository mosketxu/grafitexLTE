<?php

namespace App\Http\Controllers;

use App\{Campaign, CampaignStore, Element, Store};
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::all();
        return view('campaign.index',compact('stores'));
    }

    public function simple()
    {
        $stores=Store::all();
        $campaigns = Campaign::all();
        return view('campaign.simple', compact('campaigns','stores'));
    }

    public function datatable()
    {
        $stores=Store::all();
        $campaigns = Campaign::all();
        return view('campaign.datatable', compact('campaigns','stores'));
    }

    public function ajax()
    {
        return view('campaign.ajax');
    }

    public function select2()
    {
        return view('campaign.select2');
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
        // $request['slug'] = Str::slug($request->campaign_name);
        
        $campaign = Campaign::create($request->all());

        $cont = 0;
        
        if($campaignstores = $request->campaign_storeId){
            while ($campaignstores && $cont  < count($campaignstores)) {
                $campaignstore = new CampaignStore();
                $campaignstore->campaign_id=$campaign->id;
                $campaignstore->store_id = $campaignstores[$cont];
                $campaignstore->save();
                $cont = $cont + 1;
            }
        }

        return redirect()->route('campaign.index');
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
        $campaignEdit = Campaign::find($id);

        $storesDisponibles = Store::whereNotIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $id);
            })->get();
        $storesAsociadas = Store::whereIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $id);
        })->get();

        $medidasDisponibles=Element::whereNotIn('id',function($query) use($id){
            $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $id);
            })->get();

        $medidasAsociadas = Element::whereIn('id', function ($query) use ($id) {
            $query->select('medida_id')->from('campaign_medidads')->where('campaign_id', '=', $id);
        })->get();
            
        return view('campaign.edit', compact('campaignEdit', 'storesDisponibles', 'storesAsociadas'));
        // return view('campaign.edit', compact('campaignEdit'));
    
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
