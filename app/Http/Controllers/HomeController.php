<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\Catalogo;
use App\Models\Subestacione;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //metodo index en el cual se crean 3 variables en las cuales se llama el modelo para tener todos sus valores

        $catalogos = Catalogo::paginate();
        $zonas = Zona::all();
        $subestaciones = Subestacione::all();

        //retorna a la vista de catalogo.index con el compact cargamos en la vista catalogo.index las 3 variables: $catalogos, $zonas, $subestaciones

        return view('catalogo.index', compact('catalogos','zonas','subestaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $catalogos->perPage());
    }
}
