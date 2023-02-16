<?php

namespace App\Models;

use App\Imports\ExtractoImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class Extracto extends Model
{
    use HasFactory;
    
    protected $fillable=['id_banco','id_servicio','fecha','AG','descripcion','nro_documento','monto','deposito','saldo','sigla'];
    
    public static function obtenerTotalesParciales($id){
        return Extracto::join('bancos','extractos.id_banco','=','bancos.id')
         ->join('plataformas','bancos.id_plataforma','=','plataformas.id')
         ->with('servicio')
         ->selectRaw('id_servicio, bancos.id, extractos.descripcion, extractos.deposito, extractos.monto, 
         plataformas.id as id_plataforma, count(*) as cantidad')
         ->where(['extractos.id_banco'=> $id ])
         ->groupBy('extractos.descripcion')->groupBy('extractos.monto')
         ->groupBy('extractos.deposito')
         ->orderBy('id_servicio', 'asc')
         ->get();
         
     }
     
     public static function obtenerTotalesFinales($id){
     $totales['totalCantidad']=0;
     $totales['totalCapital']=0;
     $totales['totalDepositos']=0;
     $totales['totalRetiros']=0;
        $datos['extractos'] = Extracto::obtenerTotalesParciales($id);
        
        foreach ($datos['extractos'] as $key => $value) {
        if ($value->servicio->nombre=="OTROS PAGOS") {
            $totales['totalDepositos']+=$value->deposito*$value->cantidad;
            $totales['totalRetiros']+=$value->monto*$value->cantidad;
        }
            $totales['totalCantidad']+=$value->cantidad;
            $totales['totalCapital']+=$value->cantidad*$value->servicio->costo;
        }
       // dd($totales);
        return $totales;
     }
    
    
    public static function createFromArchivo( $archivo, $file ){
        $extracto = new ExtractoImport($archivo);
        Excel::import($extracto, $file);
        return $extracto->obtenerMontosInicioYFin();
    }
    
    
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function banco(){
        return $this->belongsTo(Banco::class, 'id_banco');
    }
    
     
    public function plataforma(){
        return $this->belongsTo(Plataforma::class, 'id_plataforma');
    }
}


