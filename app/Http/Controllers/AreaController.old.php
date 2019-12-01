<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
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
        // $campo='area';
        // $update='area.update';
        // return view('auxiliares.edit',compact('datos','campo','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Area::create($request->all());

        // $notification = array(
        //     'message' => '¡Area creada satisfactoriamente!',
        //     'alert-type' => 'success'
        // );

        // return redirect('auxiliares')->with($notification);

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
        // $datos=Area::find($id);
        // $campo='area';
        // $route='area.update';
        // return view('auxiliares.edit',compact('datos','campo','route'));
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
        // $request->validate([
        //     'area'=>'requiered|unique'
        // ]);

        // Area::where('id',$id)->update(['area'=>$request->area]);

        // $notification = array(
        //     'message' => '¡Area actualizada satisfactoriamente!',
        //     'alert-type' => 'success'
        // );

        // return redirect('auxiliares')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::destroy($id);

        

    }
}
