<?php

namespace App\Http\Controllers;
use App\Models\Arquivos;
use App\Models\Projetos;
use App\Models\ProjetoUser;
use App\Models\User;
use App\Models\Tarefas;
use Illuminate\Http\Request;
use DateTime;

class ProjetosController extends Controller
{

    public static function javascriptDateToPhpDate($data)
    {
        if ($data == null)
            return null;
        $date = new DateTime($data);
        $date->setTimezone(new \DateTimeZone('America/Fortaleza'));
        $date->modify('+3 hours');
        return $date;
    }


    public function cadastrar(Request $request)
    {

        $projeto = new Projetos();
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->id_arquivo = $request->id_arquivo;

        if (isset($request->prioridade))
            $projeto->prioridade = $request->prioridade;

        if (isset($request->dataDeInicio))
            $projeto->dataDeInicio = static::javascriptDateToPhpDate($request->dataDeInicio);

        if (isset($request->dataDeConclusao))
            $projeto->dataDeConclusao = static::javascriptDateToPhpDate($request->dataDeConclusao);


        $projeto->pontos = $request->pontos;
        $projeto->created_by = auth()->id();


        if (isset($request->prioridade))
            $projeto->prioridade = $request->prioridade;
        if (isset($request->status))
            $projeto->status = $request->status;


        $projeto->save();


        return response($projeto, 201);
    }


    public function consultar($id)
    {
        
        
        if (auth()->user()->permissao == 'administrador') {
            $projeto = Projetos::where('id', $id)->first();
           
        } else {
            $projeto = Projetos::where('id', $id)->where('created_by', auth()->id())->first();


        }     
        //depois permitiremos a consulta de quem estiver participando do projeto;
        if ($projeto == null)
            return response('', 404);
        
        $projeto->tarefas = Tarefas::select('id', 'nome', 'prioridade', 'status', 'created_at')->where('id_projeto', $projeto->id)->get();

        $colaboradores = ProjetoUser::select('user_id')->where('projeto_id', $id)->get();

        $projeto->colaboradores = User::select('id', 'name', 'email')->whereIn('id', $colaboradores)->get();










        return response($projeto, 200);

    }

    public function listar()
    {

        if (auth()->user()->permissao == 'administrador') {
            $projeto = Projetos::get();
        } else {
            $projetosMencionados = ProjetoUser::select('projeto_id')
                ->where('user_id', auth()->id())
                ->get();


            $projeto = Projetos::where('created_by', auth()->id())
                ->orWhereIn('id', $projetosMencionados)
                ->get();
        }

        for ($i = 0; $i < count($projeto); $i++) {
            if (isset($projeto[$i]->id_arquivo) && $projeto[$i]->id_arquivo != null) {
                $arquivo = Arquivos::where('id', $projeto[$i]->id_arquivo)->first();
                // $usuario->img = $arquivo->caminho . $arquivo->nome_criptografado . ".png"; 
                $projeto[$i]->img = $arquivo->caminho . $arquivo->nome_criptografado;
            } else {
                $projeto[$i]->img = null;
            }
        }

        return response($projeto, 200);
    }

    public function deletar($id)
    {
        $projeto = Projetos::where('id', $id)->where('created_by', auth()->id())->first();

        if ($projeto == null)
            return response('', 404);

        $projeto->deleted_by = auth()->id();
        $projeto->save();

        $projeto->delete();

        return response('', 200);

    }

    public function editarParcial(Request $request, $id)
    {
        $projeto = Projetos::where('id', $id)->where('created_by', auth()->id())->first();

        if (isset($request->nome))
            $projeto->nome = $request->nome;
        if (isset($request->descricao))
            $projeto->descricao = $request->descricao;

        if (isset($request->dataDeInicio))
            $projeto->dataDeInicio = static::javascriptDateToPhpDate($request->dataDeInicio);
        if (isset($request->dataDeConclusao))
            $projeto->dataDeConclusao = static::javascriptDateToPhpDate($request->dataDeConclusao);



        if (isset($request->pontos))
            $projeto->pontos = $request->pontos;
        if (isset($request->status))
            $projeto->status = $request->status;
        if (isset($request->prioridade))
            $projeto->prioridade = $request->prioridade;

        $projeto->updated_by = auth()->id();
        $projeto->save();

        return response($projeto, 200);
    }

    public function filtrar(Request $request)
    {
        $requestVazio = true;
        $projeto = Projetos::where('created_by', auth()->id());

        if (isset($request->nome)) {
            $requestVazio = false;
            $projeto->where('nome', 'like', "%$request->nome%");
        }

        if (isset($request->descricao)) {
            $requestVazio = false;
            $projeto->where('descricao', 'like', "%$request->descricao%");
        }

        if (isset($request->prioridade)) {
            $requestVazio = false;
            $projeto->where('prioridade', $request->prioridade);
        }

        if (isset($request->dataDeInicio)) {
            $requestVazio = false;
            $projeto->where('dataDeInicio', '>=', $request->dataDeInicio);
        }

        if (isset($request->dataDeConclusao)) {
            $requestVazio = false;
            $projeto->where('dataDeConclusao', '<=', $request->dataDeConclusao);
        }

        if (isset($request->status)) {
            $requestVazio = false;
            $projeto->where('status', $request->status);
        }

        if ($requestVazio == true)
            return response('', 403);

        $projeto = $projeto->get();


        return response($projeto, 200);

    }

}
