<?php

namespace App\Imports;

use App\Maestro;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMaestros implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Maestro([
            'store' => $row[0],
            'country' => $row[1], 
            'area' => $row[2], 
            'name' => $row[3], 
            'segment2018' => $row[4], 
            'segmento' => $row[5], 
            'storeconcept' => $row[6], 
            'ubicacion' => $row[7], 
            'mobiliario' => $row[8], 
            'propxelemento' => $row[9], 
            'carteleria' => $row[10], 
            'medida' => $row[11], 
            'material' => $row[12], 
            'unitxprop' =>$row[13], 
            'observaciones' =>$row[14], 
        ]);
    }
}
