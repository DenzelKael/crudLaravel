<?php

namespace App\Imports;

use App\Models\Extracto;
use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExtractoImport implements ToModel, WithHeadingRow, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $archivo;
    
    function __construct($archivo){
        $this->archivo = $archivo;    
    }
    
    
    public function model(array $row)
    {
    
        
/*         if (!isset($row['fecha_movimiento'])) {
            return null;
        }
        return new Extracto([
            'id_archivo' => $this->archivo['id'],
            'fecha' => $row['fecha_movimiento'],
            'AG' => $row['ag'],
            'descripcion' => $row['descripcion'],
            'nro_documento' => $row['nro_documento'],
            'monto' => $row['monto'],
            'saldo' => $row['saldo'],
            
            
        ]); */
    }
    
    public function collection(Collection $rows)
    {
    try {
        foreach ($rows as $row) 
        {      
   
        if (trim($row['fecha_movimiento'])!="NULL" && $row['fecha_movimiento']!=null && $row['fecha_movimiento']!="" && !is_null($row['fecha_movimiento']) 
        && $row['fecha_movimiento'] !='Total Créditos:'
        ) {
            Extracto::create([
                'id_archivo' => $this->archivo['id'],
            'fecha' => $row['fecha_movimiento'],
            'AG' => $row['ag'],
            'descripcion' => $row['descripcion'],
            'nro_documento' => $row['nro_documento'],
            'monto' => $row['monto'],
            'saldo' => $row['saldo'],
            ]);
        }
        else{
            break;
        }    
        }
        
    } catch (\Throwable $th) {
        dd($row);
    }
        
    }
    
    public function headingRow(): int
    {
        return 16;
    }
    
    
}
