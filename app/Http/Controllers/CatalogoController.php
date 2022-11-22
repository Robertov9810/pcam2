<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Subestacione;
use App\Models\Zona;
use Illuminate\Http\Request;

/**
 * Class CatalogoController
 * @package App\Http\Controllers
 */
class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorno la vista de catalogo.index
        //return view('catalogo.index', compact('catalogos','zonas','subestaciones'))
           // ->with('i', (request()->input('page', 1) - 1) * $catalogos->perPage());,
           //-----compact sirve para obtener todos los datos de cada modelo.
        $catalogos = Catalogo::paginate();
        $zonas = Zona::all();
        $subestaciones = Subestacione::all();

        return view('catalogo.index', compact('catalogos','zonas','subestaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $catalogos->perPage());
    }

    public function save3(Request $request){
        //Metodo save
        //se crea una variable $catalogo dando los valores del modelo Catalogo;
        //$catalogo->zona_id = $request->input('zona_id');
        

        $catalogo = new Catalogo;
        
        $catalogo->zona_id = $request->input('zona_id');
        $catalogo->subestacion_id = $request->input('subestacion_id');
        $catalogo->siglas = $request->input('siglas');
        $catalogo->voltaje = $request->input('voltaje');
        $catalogo->estatus = $request->input('estatus');
        $catalogo->save();

        return redirect('/catalogos');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //a la funcion create asignado las 3 variables $catalogo, $zonas, $subestaciones.
        //zona::all(); llama todos los datos del modelo de zona, y en la vista catalogo.create con el compact 
        //nos retorna todos los valores de las 3 variables creadas al comienzo.

        $catalogo = new Catalogo();
        $zonas=Zona::all();
        $subestaciones=Subestacione::all();
        return view('catalogo.create', compact('catalogo','zonas','subestaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Catalogo::$rules);

        $catalogo = Catalogo::create($request->all());

        return redirect()->route('catalogos.index')
            ->with('success', 'Catalogo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogo = Catalogo::find($id);

        return view('catalogo.show', compact('catalogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //a la funcion create asignado las 3 variables $catalogo, $zonas, $subestaciones.
        //zona::all(); llama todos los datos del modelo de zona, y en la vista catalogo.create con el compact 
        //nos retorna todos los valores de las 3 variables creadas al comienzo.
        
        $catalogo = Catalogo::find($id);
        $zonas=Zona::all();
        $subestaciones=Subestacione::all();
        return view('catalogo.edit', compact('catalogo','zonas','subestaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Catalogo $catalogo
     * @return \Illuminate\Http\Response
     */
    /**public function update(Request $request, Catalogo $catalogo)
    {
        request()->validate(Catalogo::$rules);

        $catalogo->update($request->all());

        return redirect()->route('catalogos.index')
            ->with('success', 'Catalogo updated successfully');
        
    }*/

    public function update(Request $request, $id){
        $catalogo = Catalogo:: find($id);
        $input = $request->all();
        $catalogo->fill($input)->save();

        return redirect('/catalogos');

    }

    public function UpdateStatusEnlace(Request $request )
    {
        //funcion UpdateStatusEnlace
        //se crea la varible $CatalogoUpdate que contendra los datos del modelo Catalogo
        //donde se actualizara el campo de la tabla de 'estatus' con el valor que conrtenga la varible estatus

        $CatalogoUpdate = Catalogo::findOrFail($request->id)->update(['estatus' => $request->estatus]); 

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

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $catalogo = Catalogo::find($id)->delete();

        return redirect()->route('catalogos.index')
            ->with('success', 'Catalogo deleted successfully');
    }
}
