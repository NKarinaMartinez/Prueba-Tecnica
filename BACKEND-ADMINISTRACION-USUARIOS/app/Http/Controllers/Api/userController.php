<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Departamentos;
use App\Models\Cargos;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function obtener_usuarios() {
        $usuarios = Users::with(['departamento','cargo'])->get();

        if ($usuarios->isEmpty()) {
            $data = [
                'message' => 'No se encontraron usuarios',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($usuarios, 200);
    }

    public function obtener_usuario($id) {
        $usuario = Users::find($id);

        if(!$usuario) {
            $data = [
                'message' => 'No se encontro el usuario',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'usuario' => $usuario,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function crear_usuario(Request $request) {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'primerNombre'  => 'required|string|max:100',
            'segundoNombre'  => 'required|string|max:100',
            'primerApellido'  => 'required|string|max:100',
            'segundoApellido'  => 'required|string|max:100',
            'idDepartamento'  => 'required|exists:departamentos,id',
            'idCargo'  => 'required|exists:cargos,id'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $usuario = Users::create([
            'usuario' => $request->usuario,
            'email' => $request->email,
            'primerNombre' => $request->primerNombre,
            'segundoNombre' => $request->segundoNombre,
            'primerApellido' => $request->primerApellido,
            'segundoApellido' => $request->segundoApellido,
            'idDepartamento' => $request->idDepartamento,
            'idCargo' => $request->idCargo
        ]);

        if(!$usuario) {
            return response()->json([
                'message' => 'Error al crear usuario',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'usuario' => $usuario,
            'message' => 'Usuario creado exitosamente',
            'status' => 201
        ], 201);
    }

    public function eliminar_usuario($id) {
        $usuario = Users::find($id);

        if(!$usuario) {
            $data = [
                'message' => 'No se encontro el usuario',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $usuario->delete();

        $data = [
            'message' => 'Usuario eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function actualizar_usuario(Request $request, $id) {
        $usuario = Users::find($id);

        if(!$usuario) {
            $data = [
                'message' => 'No se encontro el usuario',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'primerNombre'  => 'required|string|max:100',
            'segundoNombre'  => 'required|string|max:100',
            'primerApellido'  => 'required|string|max:100',
            'segundoApellido'  => 'required|string|max:100',
            'idDepartamento'  => 'required|exists:departamentos,id',
            'idCargo'  => 'required|exists:cargos,id'
        ]);

        if($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->primerNombre = $request->primerNombre;
        $usuario->segundoNombre = $request->segundoNombre;
        $usuario->primerApellido = $request->primerApellido;
        $usuario->segundoApellido = $request->segundoApellido;
        $usuario->idDepartamento = $request->idDepartamento;
        $usuario->idCargo = $request->idCargo;

        $usuario->save();

        $data = [
            'message' => 'Usuario actualizado',
            'usuario' => $usuario,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function listar_departamentos() {
        $departamentos = Departamentos::all();

        if($departamentos->isEmpty()) {
            $data = [
                'message' => 'No se encontraron departamentos',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($departamentos, 200);
    }

    public function listar_cargos() {
        $cargos = Cargos::all();

        if($cargos->isEmpty()) {
            $data = [
                'message' => 'No se encontraron cargos',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($cargos, 200);
    }

    public function usuario_departamento($departamento) {
        $departamento = Departamentos::where('nombre', $departamento)->first();

        if (!$departamento) {
            return response()->json([
                'message' => 'Departamento no encontrado',
                'status' => 404
            ], 404);
        }

        $usuarios = $departamento->usuarios()->with('departamento')->get(); 

        return response()->json([
            'usuarios' => $usuarios,
            'status' => 200
        ]);
    }

    public function usuario_cargo($cargo) {
        $cargo = Cargos::where('nombre', $cargo)->first();
        
        if (!$cargo) {
            return response()->json([
                'message' => 'Cargo no encontrado',
                'status' => 404
            ], 404);
        }

        $usuarios = $cargo->usuarios()->with('cargo')->get();

        return response()->json([
            'usuarios' => $usuarios,
            'status' => 200
        ]);
    }
}