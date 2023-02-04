<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $datos['productos'] = Producto::paginate(10);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
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
            'costo'=>'required',
            'existencia'=> 'required',
            'id_categoria' => 'required',
            'descuento'=>'required',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida',
          /*   'paterno.required' => 'El Apellido :attribute es requerido',
            'materno.required' => 'El Apellido :attribute es requerido', */
        ];
        
        $this->validate($request,$campos,$mensaje);
        
        $datosProducto = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $producto = Producto::insert($datosProducto);
       // dd($producto, $datosProducto);
        return redirect('/producto')->with('mensaje',"Producto Agregado Correctamente");
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
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
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
            'precio' => 'required',
            'costo'=>'required',
            'descuento'=>'required',
            'existencia' => 'required',
            'id_categoria' => 'required'
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto'=> 'La foto es requerida'
        ];
        
        if ($request->hasFile('foto')) {
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje =['foto.required'=>'La foto es requerida'];
        }
        
        $this->validate($request,$campos,$mensaje);
    
    
        $datosProducto = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $producto = Producto::findOrFail($id);
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Producto::where('id', '=', $id)->update($datosProducto);
        $producto = Producto::findOrFail($id);
        return redirect('/producto')->with('mensaje',"Producto Actualizado Correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
        $producto = Producto::findOrFail($id);
        if (Storage::delete('public/' . $producto->foto)) {
            Producto::destroy($id);
        }
        return redirect('/producto')->with('mensaje',"Producto Eliminado Correctamente");
    }
}
