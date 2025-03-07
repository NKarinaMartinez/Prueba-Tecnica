<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\userController;

Route::get('/usuarios', [userController::class, 'obtener_usuarios']);

Route::get('/obtener_usuario/{id}', [userController::class, 'obtener_usuario']);

Route::post('/crear_usuario', [userController::class, 'crear_usuario']);

Route::delete('/eliminar_usuario/{id}', [userController::class, 'eliminar_usuario']);

Route::put('/actualizar_usuario/{id}', [userController::class, 'actualizar_usuario']);

Route::get('/listar_departamentos', [userController::class, 'listar_departamentos']);

Route::get('/listar_cargos', [userController::class, 'listar_cargos']);

Route::get('/usuario_departamento/{departamento}', [userController::class, 'usuario_departamento']);

Route::get('/usuario_cargo/{cargo}', [userController::class, 'usuario_cargo']);