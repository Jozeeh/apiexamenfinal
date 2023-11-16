<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaisesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/getPaises', [PaisesController::class, 'index']);

// endpoint de registro
Route::post('/registro', [AuthController::class, 'store']);

// endpoint de login
Route::post('/login', [AuthController::class, 'login']);

// --------------------
// Rutas de hospitales
// --------------------

// endpoint de listar hospitales
Route::get('/hospitales/select', [HospitalesController::class, 'select']);
// endpoint de crear hospital
Route::post('/hospitales/store', [HospitalesController::class, 'store']);
// endpoint de eliminar hospital
Route::delete('/hospitales/delete/{id}', [HospitalesController::class, 'delete']);
