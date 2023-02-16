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
     
    public function obtenerTotalesParciales($id){
        return Extracto::join('bancos','extractos.id_banco','=','bancos.id')
        ->join('plataformas','bancos.id_plataforma','=','plataformas.id')
        ->with('servicio')
        ->selectRaw('id_servicio, bancos.id, extractos.descripcion, extractos.deposito, extractos.monto, 
        plataformas.id as id_plataforma, count(*) as cantidad')
        ->where(['extractos.id_banco'=> $id ])
        ->groupBy('extractos.descripcion')->groupBy('extractos.monto')
        ->orderBy('id_servicio', 'asc')
        ->get();
    
    }
     
    public function show($id)
    {
        $datos['cuantificadores']  = $this->obtenerTotalesParciales($id);

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
