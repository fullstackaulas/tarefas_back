<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    public function cadastrar(Request $request)
    {
        $projeto = new Projetos();
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->dataDeInicio = $request->dataDeInicio;
        $projeto->dataDeConclusao = $request->dataDeConclusao;
        $projeto->pontos = $request->pontos;
        $projeto->created_by = auth()->id();


        if(isset($request->prioridade))
            $projeto->prioridade = $request->prioridade;
        if(isset($request->status))
            $projeto->status = $request->status;


        $projeto->save();


        return response($projeto, 201);
    }


    public function consultar($id)
    {


        return response($projeto, 200);

    }

    public function listar()
    {

        return response($projeto, 200);

    }

    public function deletar($id)
    {
       

        return response('', 200);

    }

    public function editar(Request $request, $id)
    {
      

        return response($projeto, 200);
    }

    public function editarParcial(Request $request, $id)
    {
       

        return response($projeto, 200);
    }

    public function filtrar(Request $request){
       

        return response($projeto, 200);

    }

}
