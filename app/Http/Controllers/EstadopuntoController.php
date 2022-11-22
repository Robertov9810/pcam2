<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuntosRequest;
use App\Models\Estadopunto;
use Illuminate\Http\Request;

/**
 * Class EstadopuntoController
 * @package App\Http\Controllers
 */
class EstadopuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadopuntos = Estadopunto::paginate();

        return view('estadopunto.index', compact('estadopuntos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadopuntos->perPage());
    }
    public function save9(Request $request){
        $estadopunto = new Estadopunto();
        $estadopunto->nom = $request->input('nom');
        $estadopunto->save();

        return redirect('/estadopuntos');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadopunto = new Estadopunto();
        return view('estadopunto.create', compact('estadopunto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estadopunto::$rules);

        $estadopunto = Estadopunto::create($request->all());

        return redirect()->route('estadopuntos.index')
            ->with('success', 'Estado de punto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadopunto = Estadopunto::find($id);

        return view('estadopunto.show', compact('estadopunto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadopunto = Estadopunto::find($id);

        return view('estadopunto.edit', compact('estadopunto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estadopunto $estadopunto
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Estadopunto $estadopunto)
    {
        request()->validate(Estadopunto::$rules);

        $estadopunto->update($request->all());

        return redirect()->route('estadopuntos.index')
            ->with('success', 'Estado de punto actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadopunto = Estadopunto::find($id)->delete();

        return redirect()->route('estadopuntos.index')
            ->with('success', 'Estado de punto eliminado exitosamente.');
    }
}
