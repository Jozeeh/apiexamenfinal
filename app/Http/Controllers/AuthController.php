<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Endpoint para registrar nuevos usuarios
    public function store(Request $request)
    {
        // Validar campos
        $validacion = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if ($validacion->fails()) {
            // Si la validación falla se retornan los mensajes de error
            return response()->json([
                'code' => 400,
                'data' => $validacion->messages()
            ], 400);
        } else {
            // Si no falla se crea el usuario
            $usuario = User::create($request->all());
            // Se devuelven los datos del usuario junto a un token
            return response()->json([
                'code' => 200,
                'data' => $usuario,
                'token' => $usuario->createToken('token')->plainTextToken
            ], 200);
        }
    }


    // Login
    public function login(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validacion->fails()) {
            return response()->json([
                'code' => 400,
                'data' => $validacion->messages()
            ], 400);
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $usuario = User::where('email', $request->email)->first();

                return response()->json([
                    'code' => 200,
                    'data' => $usuario,
                    'token' => $usuario->createToken('token')->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'code' => 401,
                    'data' => 'Usuario no autorizado'
                ], 401);
            }
        }
    }
}
