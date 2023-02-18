<?php

namespace App\Models;

use App\Imports\bancoImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Banco extends Model
{

    use HasFactory;
    protected $fillable=['id_user','id_plataforma','fecha_cierre','monto_apertura','monto_cierre','estado'];

 
    public function getBancoByFecha(String $fecha){
        return self::where('fecha_cierre',$fecha)->with('plataforma')->get();
    }
     
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
     
    public function plataforma(){
        return $this->belongsTo(Plataforma::class, 'id_plataforma');
    }
    
    
}
