<?php

namespace App\Imports;

use App\Maestro;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MaestrosImport implements ToModel, WithHeadingRow, WithChunkReading
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Maestro([
            'store' => $row['store'],
            'country' => $row['country'], 
            'name' => $row['name'], 
            'area' => $row['area'], 
            'segment2018' => $row['segment2018'], 
            'segmento' => $row['segment2019'], 
            'storeconcept' => $row['concept'], 
            'ubicacion' => $row['ubicacion'], 
            'mobiliario' => $row['mobiliario'], 
            'propxelemento' => $row['propxelemento'], 
            'carteleria' => $row['carteleria'], 
            'medida' => $row['medida'], 
            'material' => $row['material'], 
            'unitxprop' =>$row['unitxprop'], 
            'observaciones' =>$row['observaciones'], 
        ]);
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
