<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EstadopuntoController;
use App\Http\Controllers\GerenciaController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\SubestacioneController;
use App\Http\Controllers\TipoprocesoController;
use App\Http\Controllers\TipopuntoController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('inicio');
    
});

Auth::routes();
//Rutas para las vistas del menu que va cargado en app.blade.php

Route::resource('catalogos', App\Http\Controllers\CatalogoController::class )->middleware(('auth'));
Route::resource('zonas', App\Http\Controllers\ZonaController::class )->middleware(('auth'));
Route::resource('gerencias', App\Http\Controllers\GerenciaController::class )->middleware(('auth'));
Route::resource('subestaciones', App\Http\Controllers\SubestacioneController::class )->middleware(('auth'));
Route::resource('comentarios', App\Http\Controllers\ComentarioController::class )->middleware(('auth'));
Route::resource('tipopuntos', App\Http\Controllers\TipopuntoController::class )->middleware(('auth'));
Route::resource('estadopuntos', App\Http\Controllers\EstadopuntoController::class )->middleware(('auth'));
Route::resource('puntos', App\Http\Controllers\PuntoController::class )->middleware(('auth'));
Route::resource('tipoprocesos', App\Http\Controllers\TipoprocesoController::class )->middleware(('auth'));

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para cambiar el estatus de un dato de la tabla, usando Jquery por ajax
//Route::get('/#Nombredelaruta', [#Nombredelaclasedelcontrolador::class, '#Nombredelmetodo'UpdateStatusPunto''])->name('UpdateStatusPunto'#Nombre identificador para ruta web);
Route::get('/StatusPunto', [PuntoController::class, 'UpdateStatusPunto'])->name('UpdateStatusPunto');
Route::get('/StatusValidado', [PuntoController::class, 'UpdateStatusValidado'])->name('UpdateStatusValidado');
Route::get('/ComentarioNuevo', [ComentarioController::class, 'ComentarioAgregado'])->name('ComentarioAgregado');
Route::get('/StatusEnlace', [CatalogoController::class, 'UpdateStatusEnlace'])->name('UpdateStatusEnlace');

//Rutas para el boton de guardar en los modals, /save(numero es el identificador de la ruta o direccion) seguido 
//de la clase del controlador Route::post('/save1', [GerenciaController::class, 'save1]);
//seguido del metodo llamado 'save 1'.
Route::post('/save1', [GerenciaController::class, 'save1']);
Route::post('/save2', [TipoprocesoController::class, 'save2']);
Route::post('/save3', [CatalogoController::class, 'save3']);
Route::post('/save4', [ZonaController::class, 'save4']);
Route::post('/save5', [SubestacioneController::class, 'save5']);
Route::post('/save6', [ComentarioController::class, 'save6']);
Route::post('/save7', [PuntoController::class, 'save7']);
Route::post('/save8', [TipopuntoController::class, 'save8']);
Route::post('/save9', [EstadopuntoController::class, 'save9']);


//---------------------------------

//Route::patch('/update/{id}', ['as' => 'catalogo.update', 'uses' => [CatalogoController::class, 'update']]);
//Route::patch('/update/{id} #ACTUALIZAR CON EL ID SELECCIONADO', [CatalogoController::class, 'update']#)->name('catalogo.update');
Route::patch('/update/{id}', [CatalogoController::class, 'update'])->name('catalogo.update');
Route::patch('/update1/{id}', [PuntoController::class, 'update'])->name('punto.update');

//Route::post('/modalgere', [GerenciaController::class, 'modalgere']);
/**Route::controller(PuntoController::class)->group(function() {
    Route::get('posts','ndex');
    Route::post('posts','UpdateStatusPunto');
});
Route::post('/save', 'TipoprocesoController@save');

//Route::get('/', 'TipoprocesoController@getProcesos');*/

