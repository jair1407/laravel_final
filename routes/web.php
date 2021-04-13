<?php

use App\Http\Controllers\ProfesionalController;
use Illuminate\Support\Facades\Route;

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
    return view('contenido');
});

Route::get('/profesionales',[ ProfesionalController::class,'index']); 
Route::post('/profesionales/registrar',[ ProfesionalController::class,'store']); //Registrar
Route::put('/profesionales/actualizar',[ ProfesionalController::class,'update']);//Actualizar
Route::put('/profesionales/desactivar',[ ProfesionalController::class,'desactivar']); //Desactivar
Route::put('/profesionales/activar',[ ProfesionalController::class,'activar']); //Activar

