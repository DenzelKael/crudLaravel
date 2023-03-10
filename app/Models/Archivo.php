<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $fillable=['nombre','fecha','id_plataforma','archivo'];
    
    
    public function plataforma(){
        return $this->belongsTo(Plataforma::class, 'id_plataforma');
    }
}


