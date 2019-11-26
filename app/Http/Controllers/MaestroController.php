<?php

namespace App\Http\Controllers;

use App\Imports\MaestrosImport;
use App\{Maestro,Store};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class MaestroController extends Controller
{


    public function index()
    {
        return view('maestro.index');
    }


    public function import(Request $request){

        $request->validate([
            'maestro' => 'required|mimes:xls,xlsx',
            ]);
            
        DB::table('maestros')->delete();

        try{
            (new MaestrosImport)->import(request()->file('maestro'));   
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }


        DB::table('stores')->delete();
        $stores=Maestro::insertStores();

        $notification = array(
            'message' => '¡Maestro importado satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return redirect('/maestro')->with($notification);
        
    }
}