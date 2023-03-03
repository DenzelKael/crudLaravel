<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto_apertura',
        'total_productos',
        'total_impresiones',
        'total_recargas',
        'total_capital_utilizado',
        'monto_cierre',
        'total_depositos',
        'fecha_caja',
        'total_servicios',
        'bancos'];
    protected $casts = ['bancos'=>'json', 'monto_cierre'=>'float'];
}

