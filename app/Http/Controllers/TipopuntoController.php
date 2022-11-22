<?php

namespace App\Http\Controllers;

use App\Models\Tipopunto;
use Illuminate\Http\Request;

/**
 * Class TipopuntoController
 * @package App\Http\Controllers
 */
class TipopuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipopuntos = Tipopunto::paginate();

        return view('tipopunto.index', compact('tipopuntos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipopuntos->perPage());
    }
    public function save8(Request $request){
        $tipopunto = new Tipopunto;
        $tipopunto->tipo = $request->input('tipo');
        $tipopunto->save();

        return redirect('/tipopuntos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipopunto = new Tipopunto();
        return view('tipopunto.create', compact('tipopunto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipopunto::$rules);

        $tipopunto = Tipopunto::create($request->all());

        return redirect()->route('tipopuntos.index')
            ->with('success', 'Tipo de punto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipopunto = Tipopunto::find($id);

        return view('tipopunto.show', compact('tipopunto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipopunto = Tipopunto::find($id);

        return view('tipopunto.edit', compact('tipopunto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipopunto $tipopunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipopunto $tipopunto)
    {
        request()->validate(Tipopunto::$rules);

        $tipopunto->update($request->all());

        return redirect()->route('tipopuntos.index')
            ->with('success', 'Tipo de punto actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipopunto = Tipopunto::find($id)->delete();

        return redirect()->route('tipopuntos.index')
            ->with('success', 'Tipo de punto eliminado exitosamente');
    }
}
