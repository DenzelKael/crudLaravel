<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Extracto;
use App\Models\Plataforma;
use Illuminate\Http\Request;


class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $datos['bancos'] = Banco::select('*')->with('user')->with('plataforma')->get();
        $datos['plataformas'] = Plataforma::pluck('nombre','id');
        
        return view('banco.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     public function actualizarTotales($banco,$montos){
        Banco::where('id', $banco['id'])->update([
            'monto_apertura' => $montos['inicio'],
            'monto_cierre'=> $montos['fin'],
            'total_movimientos' => $montos['totales']['totalCantidad'],
            'total_capital_utilizado'=> $montos['totales']['totalCapital'],
            'total_depositos' =>$montos['totales']['totalDepositos'],
            'total_retiros' =>$montos['totales']['totalRetiros'],
            'total_comision' => $montos['totales']['totalComision'],
            'diferencia' => $montos['inicio']+$montos['totales']['totalDepositos']-$montos['totales']['totalRetiros']-$montos['totales']['totalCapital']-$montos['fin']
        ]);
     }
     
    public function store(Request $request)
    {
      
        $campos=[
            'id_user' => 'required',
            'fecha_cierre' => 'required',
            'id_plataforma'=>'required',
            'archivo'=>'required|max:10000|mimes:xlsx,xls,xlm,xla,xlc,xlt,xlw',
            
        ];
        $mensaje=[
            'fecha_cierre.required'=>'La :attribute es requerida',
            'required'=>'El :attribute es requerido',
            'archivo.required'=>'El archivo es requerido y debe ser una Hoja de Calculo',
            'archivo.mimes' => 'El archivo debe ser en formato Excel'
        ];
        
       
        $this->validate($request,$campos,$mensaje);
        
        $datosArchivo = request()->except('_token');
        if ($request->hasFile('archivo')) {
            $datosArchivo['archivo'] = $request->file('archivo')->store('extractos');
        }
        $datosArchivo['estado']= 'ABIERTO';
 
         $banco = Banco::create($datosArchivo);
        
         
         $montos = Extracto::createFromArchivo( $banco, $request->file('archivo') );
         $montos['totales']= Extracto::obtenerTotalesFinales($banco['id']);  
         
         $this->actualizarTotales($banco,$montos);
     
    
        
        return redirect('/banco')->with('mensaje',"Archivo de Excel Agregado Correctamente. ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function getComission(Request $request)
    {
        $fecha = $request->fecha;
        $banco = new Banco();
        $bancos = $banco->getBancoByFecha($fecha);
        $totalComision = $bancos->sum('total_comision');

        return response()->json([
            'data'=> [
                'total_comision' => $totalComision,
                'bancos'=> $bancos
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'id_user' => 'required',
            'fecha_cierre' => 'required',
            'id_plataforma'=>'required',
            'archivo'=>'required|max:10000|mimes:xlsx,xls,xlm,xla,xlc,xlt,xlw',
            
        ];
        $mensaje=[
            'fecha_cierre.required'=>'La :attribute es requerida',
            'required'=>'El :attribute es requerido',
            'archivo.required'=>'El archivo es requerido y debe ser una Hoja de Calculo',
            'archivo.mimes' => 'El archivo debe ser en formato Excel'
        ];
        
        $this->validate($request,$campos,$mensaje);
    
    
        $datosArchivo = request()->except(['_token', '_method']);

        
        if ($request->hasFile('archivo')) {
            $datosArchivo['archivo'] = $request->file('archivo')->store('extractos');
        }
        $datosArchivo['estado']= 'ABIERTO';

        Banco::where('id', '=', $id)->update($datosArchivo);
       
        return redirect('/banco')->with('mensaje',"Archivo Actualizado Correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banco::destroy($id);
        return redirect('/banco')->with('mensaje',"Archivo Eliminado Correctamente");
    }
}
