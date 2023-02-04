<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuantificador extends Model
{
    use HasFactory;
    protected $fillable=['id','id_archivo','id_plataforma','id_servicio', 'cantidad'];
    public $table = "cuantificadores";
    
}
