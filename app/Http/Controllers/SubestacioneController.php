<?php

namespace App\Http\Controllers;
use App\Models\Zona;
use App\Models\Gerencia;
use App\Models\Subestacione;
use Illuminate\Http\Request;

/**
 * Class SubestacioneController
 * @package App\Http\Controllers
 */
class SubestacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subestaciones = Subestacione::paginate();
        $zonas = Zona::all();
        $gerencias = Gerencia::all();

        return view('subestacione.index', compact('subestaciones','zonas','gerencias'))
            ->with('i', (request()->input('page', 1) - 1) * $subestaciones->perPage());
    }

    public function save5(Request $request){

        $subestaciones = new Subestacione();
        
        $subestaciones->nombre = $request->input('nombre');
        $subestaciones->siglas = $request->input('siglas');
        $subestaciones->voltaje = $request->input('voltaje');
        $subestaciones->enlace = $request->input('enlace');
        $subestaciones->zona_id = $request->input('zona_id');
        $subestaciones->gerencia_id = $request->input('gerencia_id');
        $subestaciones->save();

        return redirect('/subestaciones');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subestacione = new Subestacione();
        $zonas=Zona::all();
        $gerencias=Gerencia::all();
        return view('subestacione.create', compact('subestacione', 'zonas', 'gerencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Subestacione::$rules);

        $subestacione = Subestacione::create($request->all());

        return redirect()->route('subestaciones.index')
            ->with('success', 'Subestacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subestacione = Subestacione::find($id);

        return view('subestacione.show', compact('subestacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subestacione = Subestacione::find($id);
        $zonas=Zona::all();
        $gerencias=Gerencia::all();

        return view('subestacione.edit', compact('subestacione', 'zonas', 'gerencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Subestacione $subestacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subestacione $subestacione)
    {
        request()->validate(Subestacione::$rules);

        $subestacione->update($request->all());

        return redirect()->route('subestaciones.index')
            ->with('success', 'Subestacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subestacione = Subestacione::find($id)->delete();

        return redirect()->route('subestaciones.index')
            ->with('success', 'Subestacione deleted successfully');
    }
}
