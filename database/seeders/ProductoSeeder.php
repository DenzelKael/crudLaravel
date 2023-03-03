<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Producto();
       
        $producto->nombre = "BARBIJO";
        $producto->precio = 1;
        $producto->costo = 0.32;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 115;   
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "BOLIGRAFO AZUL";
        $producto->precio = 1;
        $producto->costo = 0.6;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 115;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "BOLIGRAFO NEGRO";
        $producto->precio = 1;
        $producto->costo = 0.6;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 43;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "KLEENEX";
        $producto->precio = 2;
        $producto->costo = 1.17;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 3;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "FLIP - TAMAÑO CARTA";
        $producto->precio = 3;
        $producto->costo = 1.50;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 6;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "FLIP - TAMAÑO OFICIO";
        $producto->precio = 3.50;
        $producto->costo = 1.80;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 8;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "FOLDER AMARILLO - TAMAÑO OFICIO";
        $producto->precio = 5;
        $producto->costo = 2.50;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 1;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "FUNDAS PLASTICAS PARA CI";
        $producto->precio = 2;
        $producto->costo = 0.80;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 77;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "NEPACO METALICO";
        $producto->precio = 1;
        $producto->costo = 0.30;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 63;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "NEPACO DE PLASTICO";
        $producto->precio = 1;
        $producto->costo = 0.20;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 43;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "PAPEL FOTOGRAFICO";
        $producto->precio = 10;
        $producto->costo = 1.25;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 26;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "LAMINAS PLASTICAS PARA PLASTIFICADORA";
        $producto->precio = 5;
        $producto->costo = 0.35;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 185;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "SOBRE MANILA - TAMAÑO OFICIO";
        $producto->precio = 2;
        $producto->costo = 0.50;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 85;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "TARJETAS ENTEL DE 15";
        $producto->precio = 15;
        $producto->costo = 14.2;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 6;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "TARJETAS ENTEL DE 10";
        $producto->precio = 11;
        $producto->costo = 9.5;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 0;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "TARJETAS TIGO DE 10";
        $producto->precio = 11;
        $producto->costo = 9.4;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 15;
        $producto->foto = "";
        $producto->save();
        
           
        $producto = new Producto();
        $producto->nombre = "TARJETAS VIVA DE 10";
        $producto->precio = 11;
        $producto->costo = 9.4;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 4;
        $producto->foto = "";
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = "TARJETAS TIGO DE 20";
        $producto->precio = 20;
        $producto->costo = 18.8;
        $producto->diferencia = $producto->precio-$producto->costo;
        $producto->existencia = 7;
        $producto->foto = "";
        $producto->save();
        
        
    }
    
    
    
    
}
