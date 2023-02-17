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
    private $montos;


    function __construct($archivo)
    {
        $this->archivo = $archivo;
    }

    public function obtenerMontosInicioYFin()
    {
        return $this->montos;
    }


    public function model(array $row)
    {
    }

    public function addServicio($descripcion, $costo)
    {

        return  Servicio::select('id', 'sigla', 'costo', 'diferencia', 'precio')->where('descripcion', 'like', $descripcion . '%')
            ->where('costo', '=', trim($costo))->first() ??
            Servicio::select('id', 'sigla', 'costo', 'diferencia', 'precio')
            ->where('descripcion', '=', 'ENTRADAS Y SALIDAS DE EFECTIVO DIGITAL NO CONTEMPLADOS')
            ->where('costo', '=', '0')
            ->where('id_plataforma', '=', $this->archivo['id_plataforma'])->first();
    }

    public function collection(Collection $rows)
    {
        $sw = true;
        $sx = true;
        if ($this->archivo['id_plataforma'] == "1") {

            try {
                foreach ($rows as $row) {

                    if (
                        trim($row['fecha_movimiento']) != "NULL" && $row['fecha_movimiento'] != null 
                        && $row['fecha_movimiento'] != "" && !is_null($row['fecha_movimiento'])
                        && $row['fecha_movimiento'] != 'Total Créditos:'
                        && $row['fecha_movimiento'] != 'Total Débitos:'
                        && $row['fecha_movimiento'] != 'Tránsito'
                    ) {

                        $fecha = explode('/', $row['fecha_movimiento']);
                        $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];
                        $monto = (float) str_replace(',', '', trim($row['monto']));
                        $this->servicio = $this->addServicio($row['descripcion'], $monto * (-1));
                        //var_dump( $this->servicio->sigla, $fecha);
                        if ($monto > 0) {
                            $deposito = $monto;
                            $monto = 0;
                        } else {
                            $deposito = 0;
                        }
                        
                        Extracto::create([
                            'id_banco' => $this->archivo['id'],
                            'id_servicio' => $this->servicio->id,
                            'fecha' => $fecha,
                            'AG' => $row['ag'],
                            'descripcion' => $row['descripcion'],
                            'nro_documento' => $row['nro_documento'],
                            'monto' => $monto*(-1),
                            'deposito' => $deposito,
                            'saldo' => str_replace(',', '', trim($row['saldo'])),
                            'sigla' => $this->servicio->sigla,

                        ]);
                        //echo $monto." - ";
                        //echo $deposito;
                        //echo "<br>";
                        if ($sw) {
                        if ($monto>=0) {
                            $this->montos['inicio'] = (float) $monto + str_replace(',', '', trim($row['saldo']));
                        }else{
                            $this->montos['inicio'] = (float) $monto*(-1) + str_replace(',', '', trim($row['saldo']));
                        }
                            
                            $sw = !$sw;
                        }
                        $this->montos['fin'] = str_replace(',', '', trim($row['saldo']));
                    }
                }
            } catch (\Throwable $th) {
                dd(  $row,  $th);
            }
        } else {
            try {
                foreach ($rows as $row) {

                    /*           if (
                        trim($row['fecha_movimiento']) != "NULL" && $row['fecha_movimiento'] != null 
                        && $row['fecha_movimiento'] != "" && !is_null($row['fecha_movimiento'])
                        && $row['fecha_movimiento'] != 'Total Créditos:'
                    ) { */

                    //$contains = Str::contains($row['referencia'], ' Registro:');
                    $referencia = Str::before($row['referencia'], ' Registro:');
                    $fecha = gmdate("Y-m-d", (($row['fecha'] - 25569) * 86400));
                    $retiro = str_replace(',', '', trim($row['retiro']));
                    $deposito = str_replace(',', '', trim($row['deposito']));
                    $saldo = str_replace(',', '', trim($row['saldo']));
                    $this->servicio = $this->addServicio($referencia, $retiro);
                    //dd($referencia, $fecha, $$this->servicio);

                    Extracto::create([
                        'id_banco' => $this->archivo['id'],
                        'fecha' => $fecha,
                        'AG' => $row['agencia'],
                        'descripcion' => $referencia,
                        'nro_documento' => $row['hora'],
                        'monto' => $retiro,
                        'deposito' => $deposito,
                        'saldo' => $saldo,
                        'sigla' => $this->servicio->sigla,
                        'id_servicio' => $this->servicio->id
                    ]);
               
                    if ($sx) {
                        if ($retiro==0) {
                            $this->montos['inicio'] = (float) $deposito - $saldo;
                        }else{
                            $this->montos['inicio'] = (float) $retiro + $saldo;
                        }
                            $sx = !$sx;
                        }
                        $this->montos['fin'] = $saldo;
                    
                }
            } catch (\Throwable $th) {
                dd($this->servicio, $th);
            }
        }
        //exit;
    }

    public function headingRow(): int
    {
        if ($this->archivo['id_plataforma'] == "1") {
            return 16;
        } else if ($this->archivo['id_plataforma'] == "2") {
            return 8;
        } else {
            return 1;
        }
    }
}
