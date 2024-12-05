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
        $projeto = Projetos::where('id',$id)->where('created_by',auth()->id())->first();
    //depois permitiremos a consulta de quem estiver participando do projeto;
        if($projeto==null)
           return response('', 404);

        return response($projeto, 200);

    }

    public function listar()
    {
        $projeto = Projetos::where('created_by',auth()->id())->get();

            return response($projeto, 200);

    }

    public function deletar($id)
    {
       $projeto = Projetos::where('id',$id)->where('created_by',auth()->id())->first();

        if ($projeto==null)
            return response('', 404);

        $projeto-> deleted_by = auth()->id();
        $projeto->save();

        $projeto->delete();

        return response('', 200);

    }

    public function editarParcial(Request $request, $id)
    {
        $projeto = Projetos::where('id',$id)->where('created_by',auth()->id())->first();

        if(isset($request->nome))
            $projeto->nome = $request->nome;
        if(isset($request->descricao))
            $projeto->descricao = $request->descricao;
        if(isset($request->dataDeInicio))
            $projeto->dataDeInicio = $request->dataDeInicio;
        if(isset($request->dataDeConclusao))
            $projeto->dataDeConclusao = $request->dataDeConclusao;
        if(isset($request->pontos))
            $projeto->pontos = $request->pontos;
    
        $projeto->updated_by = auth()->id();
        $projeto->save();

        return response($projeto, 200);
    }

    public function filtrar(Request $request){
       

        return response($projeto, 200);

    }

}
