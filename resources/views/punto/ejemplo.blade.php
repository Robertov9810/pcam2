<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActividadrealizada;
use App\Models\Puesto;
use App\Models\Empleado;
use App\Models\ActividadRealizada;
use Illuminate\Http\Request;

class ActividadRealizadaController extends Controller
{
    //
    //metodo encargado de crear la pagina principal
    public function index($empleado_id=null){
        //$registros = Actividad::all();
        $puesto=null;
        $empleado = null;
        $registros = null;
        if(is_null($empleado_id))
            $registros = ActividadRealizada::orderBy('fecha_inicial','DESC')->paginate(); //se genera una paginacion automatica desde la vista
        else{
            $empleado = Empleado::where('id_empleado',$empleado_id)->first();//regresa solo una variable
            $puesto = Puesto::where('id_puesto',$empleado->id_puesto)->first();//regresa solo una variable
            $registros = ActividadRealizada::where('id_empleado',$empleado_id)->orderBy('fecha_inicial','DESC')->paginate();//regresa una coleccion (arreglo)
        }
        return view('actividadrealizada.index', compact('puesto','empleado','registros') );  //compact('registros') es lo mismo que ['registros'=>$registros]
   
    }

    public function create($id_empleado){
        return view('actividadrealizada.create',compact('id_empleado'));
    }

    //se ocupa request cuando los datos vienen de un formulario????
    //public function store(Request $request ){  //definimos que la variable es de tipo request porque lee desde el formulario
    public function store(StoreActividadRealizada $request ){  //En ves del objeto de tipo request usamos el objeto Request creado desde app\Http\Request
        
        //validamos los datos (a este nivel)
        //esta funcion al encontrar que falta un campo deiene el proceso y regresa al formulario con mensajes de error que se necesitan procesar
        //required|min:16|max:16 son reglas de validacion, separadas por '|'
        //esta regla de validacion la hacemos desde la validacion de un request app\Http\Request
        // $request->validate([
        //     'nombre'=>'required|max:255',
        //     'descripcion'=>'required',
        //     'fecha_inicial'=>'required|min:16|max:16',  //2022-02-28 17:15
        //     'fecha_final'=>'required|min:16|max:16',
        //     'duracion'=>'required|min:1|max:99',
        //     'uso_catalogo'=>'required',
        //     //'licencia'=>'required',
        //     'id_empleado'=>'required'
        // ]);

        $registro = new ActividadRealizada();
        $registro->nombre = $request->nombre;
        $registro->descripcion = $request->descripcion;
        $registro->fecha_inicial = $request->fecha_inicial;
        $registro->fecha_final = $request->fecha_final;
        $registro->duracion = $request->duracion;
        $registro->uso_catalogo = $request->uso_catalogo;
        $registro->licencia = $request->licencia;
        $registro->id_empleado = $request->id_empleado;
        $registro->save();
        
        return redirect()->route('actividadrealizada.index',$registro->id_empleado);
    }
/*
    public function show($id){
        //$registro = ActividadRealizada::find($id); //no funciona porque el campo id en la tabla no se llama solo id, sino actividadrealizada_id
        $registro = ActividadRealizada::where('id_actividadrealizada', $id)->get();
        return view('actividadrealizada.show',compact('registro'));
    }*/


    // public function edit($id){
    //    //$registro = ActividadRealizada::find($id); no funciona porque la llave primaria se llama "id_actividadrealizada" y no el default "id"
    //     $registro = ActividadRealizada::where('id_actividadrealizada', $id)->first();
    //     $empleado = Empleado::where('id_empleado',$registro->id_empleado)->first();//regresa solo una variable
    //     return view('actividadrealizada.edit',compact('empleado','registro'));
    // }

    public function edit($id_actividadrealizada){
        //$registro = ActividadRealizada::find($id); no funciona porque la llave primaria se llama "id_actividadrealizada" y no el default "id"
        //$registro = ActividadRealizada::where('id_actividadrealizada', $id)->first();
        $registro = ActividadRealizada::firstWhere('id_actividadrealizada',$id_actividadrealizada);
        $empleado = Empleado::where('id_empleado',$registro->id_empleado)->first();//regresa solo una variable
        return view('actividadrealizada.edit',compact('empleado','registro'));
    }

    //Al no pasar en el formulario un objeto con id con nombre "id" se debe de manipular con Request y sin valor de variable para que pueda enviar los datos
    //public function update(ActividadRealizada $registro){
    //    return $registro;
    //}


    //No funciona update(Request $request, ActividadRealizada $registro )
    //se debe de manipular como un Request (datos directos del formulario)
    public function update(Request $request){

        //vañidamos los datos (a este nivel)
        //esta funcion al encontrar que falta un campo deiene el proceso y regresa al formulario con mensajes de error que se necesitan procesar
        //required|min:16|max:16 son reglas de validacion, separadas por '|'
        $request->validate([
            'nombre'=>'required|max:255',
            'descripcion'=>'required',
            'fecha_inicial'=>'required|min:16|max:16',
            'fecha_final'=>'required|min:16|max:16',
            'duracion'=>'required|min:1|max:99',
            'uso_catalogo'=>'required',
            //'licencia'=>'required',
            'id_empleado'=>'required'
        ]);

        //Esto no funciona porque no llega una referencia del objeto ActividadRealizada desde el formulario
        // $registro = new ActividadRealizada();
        $registro =  ActividadRealizada::firstWhere('id_actividadrealizada',$request->id_actividadrealizada);
        $registro->nombre = $request->nombre;
        $registro->descripcion = $request->descripcion;
        $registro->fecha_inicial = $request->fecha_inicial;
        $registro->fecha_final = $request->fecha_final;
        $registro->duracion = $request->duracion;
        $registro->uso_catalogo = $request->uso_catalogo;
        $registro->licencia = $request->licencia;
        $registro->id_empleado = $request->id_empleado;
        $registro->save();
        
        //return $request;
        return redirect()->route('actividadrealizada.index',$registro->id_empleado);
    }
    

    //funcion para borrar ----------------------------------------
    public function destroy(ActividadRealizada $actividadrealizada){
        $id_empleado = $actividadrealizada->id_empleado;
        $actividadrealizada->delete();
         
         return redirect()->route('actividadrealizada.index',$id_empleado);
    }
    
}