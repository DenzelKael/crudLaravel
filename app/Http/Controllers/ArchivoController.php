<?php

namespace App\Http\Controllers;
use App\Models\Archivo;
use App\Models\Extracto;
use App\Models\Servicio;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['archivos'] = Archivo::orderBy('id','desc')->with('plataforma')->paginate(5);
         $datos['archivos'] = Archivo::selectRaw("GROUP_CONCAT(archivos.id SEPARATOR ' / ') id, 
         archivos.fecha, GROUP_CONCAT(archivos.nombre SEPARATOR ' / ') nombres, 
         GROUP_CONCAT(plataformas.nombre SEPARATOR ' / ') plataformas")
                                ->join('plataformas','plataformas.id','=','archivos.id_plataforma')
                                ->groupBy('fecha')->orderBy('fecha', 'DESC')->paginate(5);
         $datos['plataformas'] = Plataforma::paginate(10);
         //dd($datos);
        return view('archivo.index', $datos); 
    } 
    
    public function home()
    {
     
        $datos['archivos'] = Archivo::paginate(20);
        return view('archivo.home', $datos);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivo.create');
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
            'fecha' => 'required',
            'id_plataforma'=>'required',
            'archivo'=>'required|max:10000|mimes:xlsx,xls,xlm,xla,xlc,xlt,xlw',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'archivo.required'=>'El archivo es requerido y debe ser una Hoja de Calculo',
            'archivo.mimes' => 'El archivo debe ser en formato Excel'
          /*   'paterno.required' => 'El Apellido :attribute es requerido',
            'materno.required' => 'El Apellido :attribute es requerido', */
        ];
        
        $this->validate($request,$campos,$mensaje);
        
        $datosArchivo = request()->except('_token');
        if ($request->hasFile('archivo')) {
            $datosArchivo['archivo'] = $request->file('archivo')->store('extractos');
        }
        
        
        $archivo = Archivo::create($datosArchivo);
        //dd($datosArchivo);
        Extracto::createFromArchivo( $archivo, $request->file('archivo') );
        //dd('antes de guardar archivo');
        return redirect('/archivo')->with('mensaje',"Archivo de Excel Agregado Correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
       return  Archivo::find($id);
        //dd($archivo->archivo); direccion del excel en cuestion
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archivo = Archivo::findOrFail($id);
        return view('archivo.edit', compact('archivo'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = Archivo::findOrFail($id);
        if (Storage::delete($archivo->archivo)) {
            
            Archivo::destroy($id);
        }
        return redirect('/archivo')->with('mensaje',"Archivo Eliminado Correctamente");
    }
}
