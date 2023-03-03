<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Egresos;

class EgresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $egresos = new Egresos();
 
        $egresos->nombre = "ANTICIPO SUELDO SEBA";
        $egresos->observaciones = "a cuenta del sueldo seba";
        $egresos->save();

        $egresos = new Egresos();
        $egresos->nombre = "ANTICIPO SUELDO VALENTIN";
        $egresos->observaciones = "a cuenta del sueldo valentin";
        $egresos->save();

        $egresos = new Egresos();
        $egresos->nombre = "REFRIGERIO DIARIO";
        $egresos->observaciones = "Bs. 15 para cada uno. Total Bs. 30";
        $egresos->save();   

        $egresos = new Egresos();
        $egresos->nombre = "A CUENTA DE ZED";
        $egresos->observaciones = "gastos extras";
        $egresos->save();

        
        $egresos = new Egresos();
        $egresos->nombre = "OTROS GASTOS";
        $egresos->observaciones = "egresos no contemplados";
        $egresos->save();

        $egresos = new Egresos();
        $egresos->nombre = "PRESTAMO FAMILIA";
        $egresos->observaciones = "egresos solicitados para la familia";
        $egresos->save();
    }
}
