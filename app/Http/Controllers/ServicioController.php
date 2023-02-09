<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['servicios'] = Servicio::paginate(13);
        return view('servicio.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:50',
            'precio' => 'required',
            'costo' => 'required',
            'diferencia' => 'required',
            'descripcion' =>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El (La) :attribute es requerido (a)',
        ];
        
        $this->validate($request,$campos,$mensaje);
        
        $datosServicio = request()->except('_token');
        

        $servicio = Servicio::insert($datosServicio);
        
        return redirect('/servicio')->with('mensaje',"Servicio Agregado Correctamente");
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
        $servicio = Servicio::findOrFail($id);
        return view('servicio.edit', compact('servicio'));
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
            'nombre'=>'required|string|max:50',
            'sigla' => 'required',
            'precio' => 'required',
            'costo' => 'required',
            'diferencia' => 'required',
            'descripcion' =>'required|string|max:100',
            'id_plataforma'=>'required'
            
        ];
        $mensaje=[
            'required'=>'El (La) :attribute es requerido (a)',
        ];
        
        $this->validate($request,$campos,$mensaje);
        
        $datosServicio = request()->except(['_token', '_method']);
       
        Servicio::where('id', '=', $id)->update($datosServicio);
       
        
        return redirect('/servicio')->with('mensaje',"Servicio Actualizado Correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        Servicio::destroy($id);
        
        return redirect('/servicio')->with('mensaje',"Servicio Eliminado Correctamente");
    }
}
