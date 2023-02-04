<?php

namespace App\Imports;


use App\Models\Extracto;
use App\Models\Servicio;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExtractoImport implements ToModel, WithHeadingRow, ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $archivo;
    private $servicio;

    function __construct($archivo)
    {
        $this->archivo = $archivo;
    }


    public function model(array $row)
    {
    }

    public function addServicio($descripcion, $costo)
    {
        try {
       
            $servicio = Servicio::select('id','sigla', 'costo', 'diferencia', 'precio')->where('descripcion', '=', $descripcion)
                ->where('costo', '=', trim($costo))->first();
            if ($servicio == NULL) {
                $servicio = Servicio::select('id','sigla', 'costo', 'diferencia', 'precio')
                    ->where('descripcion', '=', 'ENTRADAS Y SALIDAS DE EFECTIVO DIGITAL NO CONTEMPLADOS')
                    ->where('costo', '=', '1')->first(); 
                    return $servicio; 
            }
            return $servicio;
        } catch (\Throwable $th) {
   
        }
       
    }

    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $row) {

                if (
                    trim($row['fecha_movimiento']) != "NULL" && $row['fecha_movimiento'] != null && $row['fecha_movimiento'] != "" && !is_null($row['fecha_movimiento'])
                    && $row['fecha_movimiento'] != 'Total Créditos:'
                ) {
            
              
              
                    $this->servicio = $this->addServicio($row['descripcion'], str_replace(',','',trim($row['monto'])) * (-1));
                
                    Extracto::create([
                        'id_archivo' => $this->archivo['id'],
                        'fecha' => $row['fecha_movimiento'],
                        'AG' => $row['ag'],
                        'descripcion' => $row['descripcion'],
                        'nro_documento' => $row['nro_documento'],
                        'monto' => str_replace(',','',trim($row['monto'])),
                        'saldo' => str_replace(',','',trim($row['saldo'])),
                        'sigla' => $this->servicio->sigla,
                        'id_servicio' => $this->servicio->id
                    ]);
                } else {
                    break;
                }
            }
        } catch (\Throwable $th) {
            
        }
    }

    public function headingRow(): int
    {
        return 16;
    }
}
