<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
     
    public function plataforma(){
        return $this->belongsTo(Plataforma::class, 'id_plataforma');
    }
}
