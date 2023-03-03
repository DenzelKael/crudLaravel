<?php

namespace Database\Seeders;

use App\Models\Plataforma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlataformaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plataforma = new Plataforma();
        $plataforma->truncate();
        $plataforma->nombre= "UNIMOVIL PLUS";
        $plataforma->descripcion="Banco Union";
        $plataforma->saldo = 3870.50;
        $plataforma->save();
        
        $plataforma = new Plataforma();
        $plataforma->nombre= "PRODEM";
        $plataforma->descripcion="Banco Prodem";
        $plataforma->saldo = 770.50;
        $plataforma->save();
    }
}
