<?php

namespace App\Http\Controllers;

use App\Models\PaisModel;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    // funcion para mostrar los paises
    public function index()
    {
        $paises = PaisModel::all();
        return response()->json([
            'code' => 200,
            'data' => $paises
        ], 200);
    }
}
