<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function cadastrar(Request $request)
    {
        $tarefa = new Tarefas();
        $tarefa->id_projeto = $request->id_projeto;
        $tarefa->nome = $request->nome;
        $tarefa->created_by = auth()->id();


        if (isset($request->prioridade))
            $tarefa->prioridade = $request->prioridade;
        if (isset($request->status))
            $tarefa->status = $request->status;


        $tarefa->save();


        return response($tarefa, 201);
    }


    public function consultar($id)
    {
        $tarefa = Tarefas::where('id', $id)->where('created_by', auth()->id())->first();
        //depois permitiremos a consulta de quem estiver participando do tarefa;
        if ($tarefa == null)
            return response('', 404);

        return response($tarefa, 200);

    }

    public function listar()
    {
        $tarefa = Tarefas::where('created_by', auth()->id())->get();

        return response($tarefa, 200);

    }

    public function deletar($id)
    {
        $tarefa = Tarefas::where('id', $id)->where('created_by', auth()->id())->first();

        if ($tarefa == null)
            return response('', 404);

        $tarefa->deleted_by = auth()->id();
        $tarefa->save();

        $tarefa->delete();

        return response('', 200);

    }

    public function editarParcial(Request $request, $id)
    {
        $tarefa = Tarefas::where('id', $id)->where('created_by', auth()->id())->first();

        if (isset($request->nome))
            $tarefa->nome = $request->nome;
        if (isset($request->status))
            $tarefa->status = $request->status;
        if (isset($request->prioridade))
            $tarefa->prioridade = $request->prioridade;

        $tarefa->updated_by = auth()->id();
        $tarefa->save();

        return response($tarefa, 200);
    }

    public function filtrar(Request $request)
    {
        $requestVazio = true;   
        $tarefa = Tarefas::where('created_by', auth()->id());


        if (isset($request->id_projeto)) {
            $requestVazio = false;   
            $tarefa->where('id_projeto',  $request->id_projeto);
        }
        else{
            return response('Não especificou id_projeto', 403);
        }


        if (isset($request->nome)) {
            $requestVazio = false;   
            $tarefa->where('nome', 'like', "%$request->nome%");
        }


        if (isset($request->prioridade)) {
            $requestVazio = false;  
            $tarefa->where('prioridade', $request->prioridade);
        }

        if (isset($request->status)) {
            $requestVazio = false;  
            $tarefa->where('status', $request->status);
        }

        if($requestVazio == true)
            return response('', 403);

        $tarefa = $tarefa->get();


        return response($tarefa, 200);

    }
}
