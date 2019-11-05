<?php

namespace App\Http\Controllers;

use App\Imports\MaestrosImport;



use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function import(){
        (new MaestrosImport)->import('MaestroLimpioSin.xlsx');
        // (new VehiclesImport)->import(request()->file('your_file'));    
    
        return redirect('/')->with('success', 'File imported successfully!');
    }
}
