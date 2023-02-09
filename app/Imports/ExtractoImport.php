<?php

namespace App\Imports;


use App\Models\Extracto;
use App\Models\Servicio;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
 


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
       
        return  Servicio::select('id', 'sigla', 'costo', 'diferencia', 'precio')->where('descripcion', 'like',$descripcion.'%')
                ->where('costo', '=', trim($costo))->first() ?? 
                Servicio::select('id', 'sigla', 'costo', 'diferencia', 'precio')
                    ->where('descripcion', '=', 'ENTRADAS Y SALIDAS DE EFECTIVO DIGITAL NO CONTEMPLADOS')
                    ->where('costo', '=', '0')
                    ->where('id_plataforma','=',$this->archivo['id_plataforma'])->first();
          
    }

    public function collection(Collection $rows)
    {
        if ($this->archivo['id_plataforma'] == "1") {
            
            try {
                foreach ($rows as $row) {
                    
                    if (trim($row['fecha_movimiento']) != "NULL" && $row['fecha_movimiento'] != null && $row['fecha_movimiento'] != "" && !is_null($row['fecha_movimiento'])
                        && $row['fecha_movimiento'] != 'Total Créditos:' 
                        && $row['fecha_movimiento'] != 'Total Débitos:'
                        && $row['fecha_movimiento'] != 'Tránsito') {
                          
                        $fecha = explode('/',$row['fecha_movimiento']);
                        $fecha = $fecha[2] . '-'. $fecha[1]. '-'. $fecha[0];
                        
                        $this->servicio = $this->addServicio($row['descripcion'], str_replace(',', '', trim($row['monto'])) * (-1));
                        //var_dump( $this->servicio->sigla, trim($row['fecha_movimiento']));
                  
                   
                        Extracto::create([
                            'id_archivo' => $this->archivo['id'],
                            'id_servicio' => $this->servicio->id,
                            'fecha' => $fecha,
                            'AG' => $row['ag'],
                            'descripcion' => $row['descripcion'],
                            'nro_documento' => $row['nro_documento'],
                            'monto' => str_replace(',', '', trim($row['monto'])),
                            'saldo' => str_replace(',', '', trim($row['saldo'])),
                            'sigla' => $this->servicio->sigla,
                            
                        ]);
                        
                    } 
                }
           
            } catch (\Throwable $th) {
            dd( $this->archivo['id_plataforma'], $this->servicio ,$row,  $th);
            }
        }else{
            try {
                foreach ($rows as $row) {
              
          /*           if (
                        trim($row['fecha_movimiento']) != "NULL" && $row['fecha_movimiento'] != null && $row['fecha_movimiento'] != "" && !is_null($row['fecha_movimiento'])
                        && $row['fecha_movimiento'] != 'Total Créditos:'
                    ) { */
                        
                        $contains = Str::contains($row['referencia'],' Registro:');
                        $referencia = Str::before($row['referencia'],' Registro:');
                        $fecha = gmdate("Y-m-d", (($row['fecha'] - 25569) * 86400));
                       
                        
                        if($contains){
                            $this->servicio = $this->addServicio($referencia, str_replace(',', '', trim($row['retiro'])));
                            Extracto::create([
                                'id_archivo' => $this->archivo['id'],
                                'fecha' => $fecha,
                                'AG' => $row['agencia'],
                                'descripcion' => $referencia,
                                'nro_documento' => $row['hora'],
                                'monto' => str_replace(',', '', trim($row['retiro'])),
                                'saldo' => str_replace(',', '', trim($row['saldo'])),
                                'sigla' => $this->servicio->sigla,
                                'id_servicio' => $this->servicio->id
                            ]);
                        }                     
                        
               /*      } else {
                        break;
                    } */
                }
            } catch (\Throwable $th) { //dd("catch",$th);
            }
        }
    }

    public function headingRow(): int
    {
        if ($this->archivo['id_plataforma'] == "1") {
            return 16;
        } else if($this->archivo['id_plataforma'] == "2") {
            return 8;
        }else{
        return 1;
        }
    }
}
