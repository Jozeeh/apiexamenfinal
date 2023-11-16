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

// --------------------
// Rutas de sesion
// --------------------

// endpoint de registro
Route::post('/registro', [AuthController::class, 'store']);

// endpoint de login
Route::post('/login', [AuthController::class, 'login']);

// PROTEGEMOS LAS RUTAS
Route::middleware('auth:sanctum')->group(function () {
    // --------------------
    // Rutas de paises
    // --------------------

    // endpoint de listar paises
    Route::get('/paises/select', [PaisesController::class, 'index']);

    // --------------------
    // Rutas de hospitales
    // --------------------

    // endpoint de listar hospitales
    Route::get('/hospitales/select', [HospitalesController::class, 'select']);
    // endpoint de crear hospital
    Route::post('/hospitales/store', [HospitalesController::class, 'store']);
    // endpoint de eliminar hospital
    Route::delete('/hospitales/delete/{id}', [HospitalesController::class, 'delete']);
});

