<?php

use App\Http\Controllers\ArquivosController;
use App\Http\Controllers\TestarTryCatchController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\ProjetoUsuarioController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::post('usuarios/cadastrarNovo', [UsuariosController::class, 'cadastrarNovo']);

Route::get('testarTryCatch', [TestarTryCatchController::class, 'testarTryCatch']);




Route::middleware('auth:api')->group(function(){
    
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);

    Route::prefix('arquivos')->group(function(){
        Route::post('salvar', [ArquivosController::class, 'salvarArquivo']);
        Route::get('{id}', [ArquivosController::class, 'download']);
        Route::get('{id}/download', [ArquivosController::class, 'downloadDeVerdade']);
        Route::delete('{id}', [ArquivosController::class, 'deletarDeVerdade']);
        // Route::delete('deletarArquivo/{id}', [ArquivosController::class, 'deletar']);
    });

    Route::prefix('usuarios')->group(function(){
        Route::post('/cadastrar', [UsuariosController::class, 'cadastrar']); // cadastrar um dado único
        Route::get('/consultar/{id}', [UsuariosController::class, 'consultar']);//consultar 1 individualmente
        Route::get('/listar', [UsuariosController::class, 'listar']); // listar todos
        Route::delete('/deletar/{id}', [UsuariosController::class, 'deletar']); // deletar um unico dado
        // Route::put('/editar/{id}', [UsuariosController::class, 'editar']); // editar um unico dado
        Route::patch('/editarParcial/{id}', [UsuariosController::class, 'editarParcial']); // editar um unico dado
        Route::post('/filtrar', [UsuariosController::class, 'filtrar']); // listar todos

    });

    Route::prefix('projetos')->group(function(){
        Route::post('/cadastrar', [ProjetosController::class, 'cadastrar']); // cadastrar um dado único
        Route::get('/consultar/{id}', [ProjetosController::class, 'consultar']);//consultar 1 individualmente
        Route::get('/listar', [ProjetosController::class, 'listar']); // listar todos
        Route::delete('/deletar/{id}', [ProjetosController::class, 'deletar']); // deletar um unico dado
        // Route::put('/editar/{id}', [ProjetosController::class, 'editar']); // editar um unico dado
        Route::patch('/editarParcial/{id}', [ProjetosController::class, 'editarParcial']); // editar um unico dado
        Route::post('/filtrar', [ProjetosController::class, 'filtrar']); // listar todos

    });

    Route::prefix('tarefas')->group(function(){
        Route::post('/cadastrar', [TarefasController::class, 'cadastrar']); // cadastrar um dado único
        Route::get('/consultar/{id}', [TarefasController::class, 'consultar']);//consultar 1 individualmente
        Route::get('/listar', [TarefasController::class, 'listar']); // listar todos
        Route::delete('/deletar/{id}', [TarefasController::class, 'deletar']); // deletar um unico dado
        // Route::put('/editar/{id}', [TarefasController::class, 'editar']); // editar um unico dado
        Route::patch('/editarParcial/{id}', [TarefasController::class, 'editarParcial']); // editar um unico dado
        Route::post('/filtrar', [TarefasController::class, 'filtrar']); // listar todos

    });



    Route::prefix('projetoUsuario')->group(function(){
        Route::post('/cadastrar', [ProjetoUsuarioController::class, 'cadastrar']); // cadastrar um dado único
        Route::delete('/deletar/{projeto}/{usuario}', [ProjetoUsuarioController::class, 'deletar']); // deletar um unico dado

    });




});

Route::post('login', [AuthController::class, 'login']);


/*
Projeto
Nome
Descrição
Prioridade (urgente, alta, normal, baixa)
data de início
data de conclusão
status(analise, pronto para começar, desenvolvendo, testando, revisão, pronto para entrega, entregue)
pontos
*/
