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


