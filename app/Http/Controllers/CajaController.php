<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Caja;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cajas'] = Caja::paginate(10);
        return view('caja.index', $datos);
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
  
        
            
        $caja = Caja::create([
            'monto_apertura'=>$request->monto_apertura,
            'total_productos' => $request->total_productos,
            'total_impresiones' =>$request->total_impresiones,
            'total_recargas' => $request->total_recargas,
            'monto_cierre' => $request->monto_apertura+$request->total_comision
                            +$request->total_productos+$request->total_capital_utilizado
                            +$request->total_impresiones+$request->total_recargas-$request->total_depositos,
            'fecha_caja' => $request->fecha,
            'total_servicios' => $request->total_comision,
            'total_depositos' => $request->total_depositos,
            'total_capital_utilizado' => $request->total_capital_utilizado,
            'bancos' => []
        ]);
        return response()->json([
            'data' => $caja
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Caja::destroy($id);
        return redirect('/caja')->with('mensaje',"Caja Eliminada Correctamente");
    }
}
