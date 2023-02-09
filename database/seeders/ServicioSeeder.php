<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE CEDULAS DE IDENTIDAD";
        $servicio->sigla = "P_CI_22_UNIMOVIL";
        $servicio->descripcion="N/D PAGO SEGIP MEDIANTE UNINET";
        $servicio->id_plataforma = 1;
        $servicio->precio = 22;
        $servicio->costo= 17;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE CEDULAS DE IDENTIDAD";
        $servicio->sigla = "P_CI_22_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP CEDULAS DE IDENTIDAD NACIONAL";
        $servicio->id_plataforma = 2;
        $servicio->precio = 22;
        $servicio->costo= 17;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE LICENCIAS DE CONDUCIR - MT";
        $servicio->sigla = "P_LIC_MT_90_UNIMOVIL";
        $servicio->descripcion="N/D PAGO SEGELIC MEDIANTE UNINET";
        $servicio->id_plataforma = 1;
        $servicio->precio = 90;
        $servicio->costo= 80;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE LICENCIAS DE CONDUCIR - MT";
        $servicio->sigla = "P_LIC_MT_90_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL";
        $servicio->id_plataforma = 2;
        $servicio->precio = 90;
        $servicio->costo= 80;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE LICENCIAS DE CONDUCIR - ABCP";
        $servicio->sigla = "P_LIC_ABCP_235_UNIMOVIL";
        $servicio->descripcion="N/D PAGO SEGELIC MEDIANTE UNINET";
        $servicio->id_plataforma = 1;
        $servicio->precio = 235;
        $servicio->costo= 225;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE LICENCIAS DE CONDUCIR - ABCP";
        $servicio->sigla = "P_LIC_ABCP_235_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL";
        $servicio->id_plataforma = 2;
        $servicio->precio = 235;
        $servicio->costo= 225;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE ANTECEDENTES PARA NUEVAS LIC. - TRICA";
        $servicio->sigla = "P_ANT_N_220";
        $servicio->descripcion="N/D PAGO CERT. ANTECEDENTES CUDAP QR";
        $servicio->id_plataforma = 1;
        $servicio->precio = 220;
        $servicio->costo= 200;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE ANTECEDENTES PARA RENOVAR LIC. - TRANSITO";
        $servicio->sigla = "P_ANT_R_70";
        $servicio->descripcion="N/D PAGO CERT. ANTECEDENTES CUDAP QR";
        $servicio->id_plataforma = 1;
        $servicio->precio = 70;
        $servicio->costo= 50;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE INSPECCION TECNICA VEHICULAR - CON MULTA I";
        $servicio->sigla = "P_INS_TEC_60";
        $servicio->descripcion="N/D PAGO IMPUESTOS VIA WEB RUAT";
        $servicio->id_plataforma = 1;
        $servicio->precio = 60;
        $servicio->costo= 50;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE INSPECCION TECNICA VEHICULAR - PARTICULAR";
        $servicio->sigla = "P_INS_TEC_40";
        $servicio->descripcion="N/D PAGO IMPUESTOS VIA WEB RUAT";
        $servicio->id_plataforma = 1;
        $servicio->precio = 40;
        $servicio->costo= 30;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE INSPECCION TECNICA VEHICULAR - PUBLICO";
        $servicio->sigla = "P_INS_TEC_30";
        $servicio->descripcion="N/D PAGO IMPUESTOS VIA WEB RUAT";
        $servicio->id_plataforma = 1;
        $servicio->precio = 30;
        $servicio->costo= 20;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE CERTIFICACION DE CEDULA DE IDENTIDAD";
        $servicio->sigla = "P_CERT_CI_15_UNIMOVIL";
        $servicio->descripcion="N/D PAGO SEGELIC MEDIANTE UNINET";
        $servicio->id_plataforma = 1;
        $servicio->precio = 15;
        $servicio->costo= 10;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE CERTIFICACION DE CEDULA DE IDENTIDAD";
        $servicio->sigla = "P_CERT_CIE_15_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP CERTIFICACIONES EXTRANJERO";
        $servicio->id_plataforma = 2;
        $servicio->precio = 15;
        $servicio->costo= 10;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE CERTIFICACION DE CEDULA DE IDENTIDAD";
        $servicio->sigla = "P_CERT_CI_15_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP CERTIFICACIONES";
        $servicio->id_plataforma = 2;
        $servicio->precio = 15;
        $servicio->costo= 10;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE DUPLICADO DE LICENCIAS DE CONDUCIR AUTOMOVIL";
        $servicio->sigla = "P_DUP_ABCP_170_UNIMOVIL";
        $servicio->descripcion="N/D PAGO SEGELIC MEDIANTE UNINET";
        $servicio->id_plataforma = 1;
        $servicio->precio = 170;
        $servicio->costo= 160;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE DUPLICADO DE LICENCIAS DE CONDUCIR AUTOMOVIL";
        $servicio->sigla = "P_DUP_ABCP_170_PRODEM";
        $servicio->descripcion="Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL";
        $servicio->id_plataforma = 2;
        $servicio->precio = 170;
        $servicio->costo= 160;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE B-SISA PARA CARGAR COMBUSTIBLE";
        $servicio->sigla = "P_B_SISA_70";
        $servicio->descripcion="N/D TRASP. A ANH - RECAUDADORA";
        $servicio->id_plataforma = 1;
        $servicio->precio = 70;
        $servicio->costo= 60;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "PAGO DE ANTECEDENTES FELCC O FELCN";
        $servicio->sigla = "P_ANT_CC_CN_100";
        $servicio->descripcion="N/D PAGO CERT. ANTECEDENTES CUDAP QR";
        $servicio->id_plataforma = 1;
        $servicio->precio = 100;
        $servicio->costo= 80;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "OTROS PAGOS";
        $servicio->sigla = "P_OTROS_UNIMOVIL";
        $servicio->descripcion="ENTRADAS Y SALIDAS DE EFECTIVO DIGITAL NO CONTEMPLADOS";
        $servicio->id_plataforma = 1;
        $servicio->precio = 0;
        $servicio->costo= 0;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        $servicio = new Servicio();
        $servicio->nombre = "OTROS PAGOS";
        $servicio->sigla = "P_OTROS_PRODEM";
        $servicio->descripcion="ENTRADAS Y SALIDAS DE EFECTIVO DIGITAL NO CONTEMPLADOS";
        $servicio->id_plataforma = 2;
        $servicio->precio = 0;
        $servicio->costo= 0;
        $servicio->diferencia = $servicio->precio - $servicio->costo;
        $servicio->save();
        
        
    }
}
