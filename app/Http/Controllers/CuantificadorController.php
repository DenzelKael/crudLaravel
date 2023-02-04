<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Extracto;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Cuantificador;

class CuantificadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $datos['extractos'] = Extracto::paginate(5);
        return view('cuantificador.index', $datos); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function addServicio($descripcion,$costo){
    try {
        $servicio = Servicio::select('sigla', 'costo', 'diferencia', 'precio')->where('descripcion','=',$descripcion)
                    ->where('costo','=',$costo)->first();
       
        return $servicio;
    } catch (\Throwable $th) {
     
    }
        
       
    } 
     
     
     
    public function show($id)
    {
    
    // plataformas,archivos,extractos
    
     $datos['cuantificadores'] = Extracto::join('archivos','extractos.id_archivo','=','archivos.id')
     ->join('plataformas','archivos.id_plataforma','=','plataformas.id')
     ->with('servicio')
     ->selectRaw('id_servicio, archivos.id as id_archivo, extractos.descripcion, extractos.monto, plataformas.id as id_plataforma, count(*) as cantidad')
     ->where(['id_archivo'=> $id ])
     ->groupBy('extractos.descripcion')->groupBy('extractos.monto')
     ->orderBy('cantidad', 'desc') 
     ->orderBy('extractos.monto', 'asc')
     ->get();
          //dd($datos['cuantificadores']->toArray());
     $datos['servicios'] = Servicio::select()->get(); 
    //  $cuantificadores = $datos['cuantificadores'][0]->toArray();
    //  $servicios = $datos['servicios'][0]->toArray();
     
    return view('cuantificador.index', $datos); 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
