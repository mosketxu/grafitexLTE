<?php

namespace App\Http\Controllers;

use App\Imports\MaestrosImport;
use App\{Maestro,Ubicacion,Area, Carteleria, Country, Medida, Mobiliario, Segmento, Storeconcept,Propxelemento};
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
        DB::table('stores')->delete();
        DB::table('elementos')->delete();
        DB::table('ubicacions')->delete();
        DB::table('areas')->delete();
        DB::table('cartelerias')->delete();
        DB::table('countries')->delete();
        DB::table('medidas')->delete();
        DB::table('mobiliarios')->delete();
        DB::table('segmentos')->delete();
        DB::table('propxelementos')->delete();
        DB::table('storeconcepts')->delete();
 
        try{
            (new MaestrosImport)->import(request()->file('maestro'));   
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }
        
        Maestro::insertStores();

        Ubicacion::insert(Maestro::select('ubicacion')->distinct('ubicacion')->get()->toArray());
        Area::insert(Maestro::select('area')->distinct('area')->get()->toArray());
        Carteleria::insert(Maestro::select('carteleria')->distinct('carteleria')->get()->toArray());
        Country::insert(Maestro::select('country')->distinct('country')->get()->toArray());
        Medida::insert(Maestro::select('medida')->distinct('medida')->get()->toArray());
        Mobiliario::insert(Maestro::select('mobiliario')->distinct('mobiliario')->get()->toArray());
        Propxelemento::insert(Maestro::select('propxelemento')->distinct('propxelemento')->get()->toArray());
        Segmento::insert(Maestro::select('segmento')->distinct('segmento')->get()->toArray());
        Storeconcept::insert(Maestro::select('storeconcept')->distinct('storeconcept')->get()->toArray());
        
        Maestro::insertElementos();

        Maestro::insertStoreElementos();

        $notification = array(
            'message' => '¡Maestro y tablas principales importados satisfactoriamente!',
            'alert-type' => 'success'
        );
        
        return redirect('/maestro')->with($notification);
        
    }
}