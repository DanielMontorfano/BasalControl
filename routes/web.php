<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\MaterialController;

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

Route::resource('personas', PersonaController::class);
//Route::get('personas', [EquipoController::class, 'salida1'])->name('personas.salida1');


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
