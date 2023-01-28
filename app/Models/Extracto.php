<?php

namespace App\Models;

use App\Imports\ExtractoImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class Extracto extends Model
{
    use HasFactory;
    
    protected $fillable=['id_archivo','fecha','AG','descripcion','nro_documento','monto','saldo'];
    
    
    public static function createFromArchivo( $archivo, $file ){
        // $file = $request->file('archivo');
        
        Excel::import(new ExtractoImport($archivo), $file);
    }
}


