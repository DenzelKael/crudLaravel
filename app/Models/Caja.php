<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $fillable = ['monto_apertura','monto_cierre','fecha_caja','total_servicios','bancos'];
    protected $casts = ['bancos'=>'json', 'monto_cierre'=>'float'];
}

