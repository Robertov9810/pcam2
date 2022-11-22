<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuntosRequest;
use App\Models\Comentario;
use App\Models\Estadopunto;
use App\Models\Punto;
use App\Models\Subestacione;
use App\Models\Tipopunto;
use Illuminate\Http\Request;

/**
 * Class PuntoController
 * @package App\Http\Controllers
 */
class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function puntosHome()
    {
        $puntos = Punto::orderBy('id')->get();
        return view('Punto.index', compact('Puntos'));
    }

    public function index()
    {
        //en la funcion index se crean las 5 variables donde tendran cada uno diferente valor de acuerdo al modelo asignado
        //para que la variable contenga todos los valores del modelo.
        $puntos = Punto::paginate();
        $estadopuntos = Estadopunto::all();
        $comentarios = Comentario::all();
        $subestaciones = Subestacione::all();
        $tipopuntos = Tipopunto::all();

        //return view retorna o devuelve la vista punto.index en la cual se cargan en valor de las 5 variables
        //trayendo todos sus datos
        return view('punto.index', compact('puntos','estadopuntos','comentarios','subestaciones','tipopuntos'))
            ->with('i', (request()->input('page', 1) - 1) * $puntos->perPage());
            
    }

    public function save7(Request $request){
        //metodo save7
        //variable $puntos = new Punto#es del nombre del modelo();

        $puntos = new Punto();
        
        //en el modelo punto 
        //se declaro esta estructura:
        /**
         * static $rules = [
		*'leyenda' => 'required',
		*'entity_name' => 'required',
		*'bin_in' => 'required',
		*'bin_out' => 'required',
		*'estatus' => 'required',
        *'comentario_id' => 'required',
        *'control_validado' => 'required',
        *'estadopunto_id' => 'required',
		*'subestacion_id' => 'required',
		*'tipopunto_id' => 'required',	
    *];
         * 
         */
        /**
         * la cual es la misma que se pone aqui asignando en cada columna de la tabla el valor que se arrojara
         * con el input('#nombre de la variale')
         */
        $puntos->leyenda = $request->input('leyenda');
        $puntos->entity_name = $request->input('entity_name');
        $puntos->bin_in = $request->input('bin_in');
        $puntos->bin_out = $request->input('bin_out');
        $puntos->estatus = $request->input('estatus');
        $puntos->comentario = $request->input('comentario');
        $puntos->estadopunto_id = $request->input('estadopunto_id');
        $puntos->control_validado = $request->input('control_validado');
        $puntos->subestacion_id = $request->input('subestacion_id');
        $puntos->tipopunto_id = $request->input('tipopunto_id');
        $puntos->save();

        $newComentario = Comentario::create([

            'punto_id' => $puntos->id,
            'texto' => $puntos-> comentario
        ]);

        //luego de terminar de guardar los datos en la tabla de puntos retorna a la vista (/puntos) que
        //es el nombre de la ruta
        return redirect('/puntos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $punto = new Punto();
        $comentarios=Comentario::all();
        $estadopuntos=Estadopunto::all();
        $subestaciones=Subestacione::all();
        $tipopuntos=Tipopunto::all();

        return view('punto.create', compact('punto','comentarios','estadopuntos','subestaciones','tipopuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Punto::$rules);

        $punto = Punto::create($request->all());

        return redirect()->route('puntos.index')
            ->with('success', 'Punto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $punto = Punto::find($id);

        return view('punto.show', compact('punto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $punto = Punto::find($id);
        $comentarios=Comentario::all();
        $estadopuntos=Estadopunto::all();
        $subestaciones=Subestacione::all();
        $tipopuntos=Tipopunto::all();

        return view('punto.edit', compact('punto','comentarios','estadopuntos','subestaciones','tipopuntos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Punto $punto
     * @return \Illuminate\Http\Response
     */

    /**public function update(Request $request, Punto $punto)
    {
        request()->validate(Punto::$rules);

        $punto->update($request->all());

        return redirect()->route('puntos.index')
            ->with('success', 'Punto actualizado exitosamente.');
    }*/

    public function update(Request $request, $id){
        $punto = Punto:: find($id);
        $input = $request->all();
        $punto->fill($input)->save();

        return redirect('/puntos');
    }
    
    //FUNCION PARA REQUERIDO OPERACION
    public function UpdateStatusPunto(Request $request )
    {
        //funcion UpdateStatusPunto
        //se crea la varible $PuntoUpdate que contendra los datos del modelo Punto
        //donde se actualizara el campo de la tabla de 'estatus' con el valor que conrtenga la varible estatus

        $PuntoUpdate = Punto::findOrFail($request->id)->update(['estatus' => $request->estatus]); 

        //hace una consulta del estatus y si es igual a cero el boton cambiara a color rojo y dira 'NO' el cual sera asignado
        //a la variable $newStatus.
        if($request->estatus == 0) {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-danger">No</button>';
            //en caso de que el estatus no sea igual a cero y sea diferente a cero la varible $newStatus
            //tendra este valor '<br> <button type="button" class="btn btn-sm btn-success">Si</button>'
        }else{
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-success">Si</button>';
        }

        //returna una respuesta de json donde la varible var se enviara con el valor que contenga la variable $newStatus
        return response()->json(['var'=>''.$newStatus.'']);
        }

        //FUNCION PARA CONTROL_VALIDADO
        public function UpdateStatusValidado(Request $request )
    {
        $PuntoUpdate2 = Punto::findOrFail($request->id)->update(['control_validado' => $request->control_validado]); 

        if($request->control_validado == 0) {
            $newStatuss = '<br> <button type="button" class="btn btn-sm btn-danger">No</button>';
        }else{
            $newStatuss = '<br> <button type="button" class="btn btn-sm btn-success">Si</button>';
        }
        return response()->json(['var'=>''.$newStatuss.'']);      
        }

        public function ComentarioAgregado(Request $request )
        {
            $ComentarioAgre = Comentario::findOrFail($request->id)->response(['punto_id' => $request->id]); 
    
            if($request->punto_id == 'id') {
                $MostrarComentario = '$comentario->texto';
            }else{
                $MostrarComentario = '<br> <button type="button" class="btn btn-sm btn-success">Si</button>';
            }
            return response()->json(['var'=>''.$MostrarComentario.'']);      
            }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $punto = Punto::find($id)->delete();

        return redirect()->route('puntos.index')
            ->with('success', 'Punto eliminado exitosamente.');
    }
}
