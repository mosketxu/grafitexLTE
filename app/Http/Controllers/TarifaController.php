<?php

namespace App\Http\Controllers;

use App\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        } 
        $tarifas = Tarifa::search($request->busca)
            ->paginate(8);

        return view('tarifa.index', compact('tarifas','busqueda'));
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
        $request->validate([
            'familia'=>'required',
            'tramo1'=>'required|numeric',
            'tramo2'=>'required|numeric',
            'tramo3'=>'required|numeric',
            'tarifa1'=>'required|numeric',
            'tarifa2'=>'required|numeric',
            'tarifa3'=>'required|numeric',
        ]);

        $tarifa = Tarifa::create($request->all());

        $notification = array(
            'message' => 'Tarifa creada satisfactoriamente!',
            'alert-type' => 'success'
        );
            
        return redirect()->back()->with($notification);
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
        $tarifa=Tarifa::find($id);
        return view('tarifa.edit',compact('tarifa'));

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
        $request->validate([
            'familia' => 'required',
            'tramo1' => 'required|numeric',
            'tarifa1' => 'required|numeric',
            'tramo2' => 'required|numeric',
            'tarifa2' => 'required|numeric',
            'tramo3' => 'required|numeric',
            'tarifa3' => 'required|numeric',
        ]);

        tarifa::find($id)->update($request->all());

        $notification = array(
            'message' => 'Tarifa actualizada satisfactoriamente!',
            'alert-type' => 'success'
        );
            
        return redirect()->route('tarifa.index')->with($notification);
        
        // return redirect()->route('tarifa.index')->with('success','tarifa actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarifa::find($id)->delete();

        $notification = array(
            'message' => 'Tarifa eliminada satisfactoriamente!',
            'alert-type' => 'success' 
        );
  
        return redirect()->back()->with($notification);

        // return response()->json(['success'=>'Eliminado con exito']);
    }
}
