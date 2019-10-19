<?php

namespace App\Http\Controllers;

use App\Element;
use App\StoreElement;
use Illuminate\Http\Request;

class StoreElementController extends Controller
{


    public function eleAsoc($storeid)
    {
        // $stoAsoc=CampaignStore::where('campaign_id',$campaignid)->get();

        $eleAsoc=StoreElement::join('stores','stores.id',"=","store_id")
        ->select('store_elements.id as stoEleId','stores.id', 'stores.store')
        ->where('store_id',$storeid)->get();

        return response()->json(
            $eleAsoc->toArray()
        );
    }

    public function eleDisp($storeid)
    {
     
        $eleDisp=Element::whereNotIn('id', function ($query) use ($storeid) {
             $query->select('store_id')->from('store_elements')->where('store_id', '=', $storeid);
        })->get();

        return response()->json(
            $eleDisp->toArray()
        );
    }

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
