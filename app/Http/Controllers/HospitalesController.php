<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalesController extends Controller
{
    
    public function store(Request $request) {
        $validaciones = Validator::make($request->all(), [
            'nombre' => 'required',
            'direccion' => 'required',
            'fkIdPais' => 'required'
        ]);

        if ($validaciones->fails()) {
            return response()->json([
                'code' => 400,
                'data' => $validaciones->messages()
            ], 400);
        } else {
            $hospital = HospitalModel::create($request->all());
            return response()->json([
                'code' => 200,
                'data' => $hospital
            ], 200);
        }
    }

}
