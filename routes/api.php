<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::middleware('auth:api')->group(function(){
    
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');

    Route::prefix('usuarios')->group(function(){
        Route::post('/cadastrar', [UsuariosController::class, 'cadastrar']); // cadastrar um dado único
        Route::get('/consultar/{id}', [UsuariosController::class, 'consultar']);//consultar 1 individualmente
        Route::get('/listar', [UsuariosController::class, 'listar']); // listar todos
        Route::delete('/deletar/{id}', [UsuariosController::class, 'deletar']); // deletar um unico dado
        Route::put('/editar/{id}', [UsuariosController::class, 'editar']); // editar um unico dado
        Route::patch('/editarParcial/{id}', [UsuariosController::class, 'editarParcial']); // editar um unico dado
        Route::post('/filtrar', [UsuariosController::class, 'filtrar']); // listar todos

    });


});

Route::post('login', [AuthController::class, 'login']);
