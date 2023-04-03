<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\MaterialController;
use App\Models\Persona;


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

Route::resource('personas', PersonaController::class); //Sale caminando con materiales
Route::get('salida1/{personaId}', function($personaId){
    $persona= Persona::find($personaId);
    return view('personas.salida1', compact('persona',$persona->id, $persona->ficha_id));
})->name('personas.salida1');
Route::put('conSalida1', [PersonaController::class,'conSalida1'])->name('personas.conSalida1');

Route::get('salida2/{personaId}', function($personaId){  //Sale caminando sin materiales
    $persona= Persona::find($personaId);
    return view('personas.salida2', compact('persona',$persona->id, $persona->ficha_id));
})->name('personas.salida2');
Route::put('conSalida2', [PersonaController::class,'conSalida2'])->name('personas.conSalida2');

Route::get('salida3/{personaId}', function($personaId){  //Sale con vehiculo con materiales
    $persona= Persona::find($personaId);
    return view('personas.salida3', compact('persona',$persona->id, $persona->ficha_id));
})->name('personas.salida3');
Route::put('conSalida3', [PersonaController::class,'conSalida3'])->name('personas.conSalida3');








Route::resource('fichas', FichaController::class);
Route::resource('materials', MaterialController::class);

Route::get('/', function () {
    return view('inicio');
});




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::view('home','home')->name('home');

});
