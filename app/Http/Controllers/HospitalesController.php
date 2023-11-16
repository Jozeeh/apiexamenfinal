<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HospitalesController extends Controller
{
    // Endpoint listar hospitales
    public function select() {
        $hospitales = DB::table('hospitales')
            ->select(
                'hospitales.idHospital', 
                'hospitales.nombre', 
                'hospitales.direccion', 
                'paises.nombre as pais')
            ->join('paises', 'hospitales.fkIdPais', '=', 'paises.idPais')
            ->get();
        // Si hay hospital
        if (count($hospitales) > 0) {
            return response()->json([
                'code' => 200,
                'data' => $hospitales
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'data' => 'No hay hospitales registrados'
            ], 404);
        }
    }

    // Endpoint crear hospital
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
                'state' => 'Hospital ingresado',
                'data' => $hospital
            ], 200);
        }
    }

    //Endpoint eliminar hospital
    public function delete($id) {
        $hospital = HospitalModel::find($id);
        if ($hospital) {
            $hospital->delete();
            return response()->json([
                'code' => 200,
                'data' => 'Hospital eliminado'
            ], 200);
        } else {
            return response()->json([
                'code' => 404,
                'data' => 'Hospital no encontrado'
            ], 404);
        }
    }

}
