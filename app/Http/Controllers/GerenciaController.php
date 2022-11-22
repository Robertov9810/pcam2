<?php

namespace App\Http\Controllers;

use App\Models\Gerencia;
use App\Models\Tipoproceso;
use Illuminate\Http\Request;

/**
 * Class GerenciaController
 * @package App\Http\Controllers
 */
class GerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //en la funcion index se crean dos variables las cuales seran $gerencias, $tipoprocesos
        //las cuales tienen los valores del modelo

        $gerencias = Gerencia::paginate();
        $tipoprocesos = Tipoproceso::all();

        //retorna a la vista gerencia.index en el cual estarian cargados gracias al compact con las variables
        //$gerencias, $tipoprocesos con todos sus valores
        return view('gerencia.index', compact('gerencias','tipoprocesos'))
            ->with('i', (request()->input('page', 1) - 1) * $gerencias->perPage());
    }

    public function save1(Request $request){

        $gerencia = new Gerencia;
        
        $gerencia->nombre = $request->input('nombre');
        $gerencia->siglas = $request->input('siglas');
        $gerencia->acronimo = $request->input('acronimo');
        $gerencia->tipoproceso_id = $request->input('tipoproceso_id');
        $gerencia->save();

        return redirect('/gerencias');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gerencia = new Gerencia();
        $tipoprocesos = Tipoproceso::all();
        return view('gerencia.create', compact('gerencia','tipoprocesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Gerencia::$rules);

        $gerencia = Gerencia::create($request->all());

        return redirect()->route('gerencias.index')
            ->with('success', 'Gerencia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gerencia = Gerencia::find($id);

        return view('gerencia.show', compact('gerencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gerencia = Gerencia::find($id);
        $tipoprocesos = Tipoproceso::all();
        return view('gerencia.edit', compact('gerencia','tipoprocesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gerencia $gerencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerencia $gerencia)
    {
        request()->validate(Gerencia::$rules);

        $gerencia->update($request->all());

        return redirect()->route('gerencias.index')
            ->with('success', 'Gerencia actualizada exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gerencia = Gerencia::find($id)->delete();

        return redirect()->route('gerencias.index')
            ->with('success', 'Gerencia eliminada existosamente');
    }
}
