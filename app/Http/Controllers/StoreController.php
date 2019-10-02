<?php

namespace App\Http\Controllers;

use App\{Element, Store, StoreElement};
use Illuminate\Http\Request;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elementos=Element::all();
        $stores=Store::with('StoreElement')
            ->orderBy('id','asc')
            ->paginate(10);
        return view('store.index',compact('stores','elementos'));
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
        $store = Store::create($request->all());

        $cont = 0;
        
        if($storeelements = $request->store_elementoId){
            while ($storeelements && $cont  < count($storeelements)) {
                $storeelement = new StoreElement();
                $storeelement->store_id=$request->id;
                $storeelement->element_id = $storeelements[$cont];
                $storeelement->save();
                $cont = $cont + 1;
            }
        }

        return redirect()->route('store.index');
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
        $storeEdit = Store::find($id);

        $elementosDisponibles = Element::whereNotIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('store_elements')->where('store_id', '=', $id);
            })->get();
        $storesAsociadas = Element::whereIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('store_elements')->where('store_id', '=', $id);
        })->get();

        return view('store.edit', compact('storeEdit', 'elementosDisponibles', 'storesAsociadas'));

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
