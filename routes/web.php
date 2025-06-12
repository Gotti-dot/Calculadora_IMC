<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController; // Asegúrate de importar el controlador

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
    return view('welcome');
});

// Ruta para mostrar el formulario del IMC
Route::get('/imc', [ImcController::class, 'showForm'])->name('imc.form');

// Ruta para procesar el formulario y calcular el IMC
Route::post('/imc/calculate', [ImcController::class, 'calculateImc'])->name('imc.calculate');