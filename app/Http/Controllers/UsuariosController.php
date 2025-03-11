<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Arquivos;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function cadastrar(Request $request)
    {

        $usuarioQtd = User::where('email', $request->email)->count();

        if ($usuarioQtd > 0)
            return response('', 409);


        $usuario = new User();
        $usuario->email = $request->email;
        $usuario->id_arquivo         = $request->id_arquivo;
        $usuario->name = $request->name;
        $usuario->password = bcrypt($request->password);

        $usuario->created_by = auth()->id();
        $usuario->save();

        return response($usuario, 201);
    }

    public function cadastrarNovo (Request $request)
    {

        $usuarioQtd = User::where('email', $request->email)->count();

        if ($usuarioQtd > 0)
            return response('', 409);


        $usuario = new User();
        $usuario->id_arquivo         = $request->id_arquivo;
        $usuario->email              = $request->email;
        $usuario->name               = $request->name;
        $usuario->password           = bcrypt($request->password);
        $usuario->created_by         = 0;
        $usuario->save();

        return response($usuario, 201);
    }


    public function consultar($id)
    {
        $usuario = User::where('id', $id)->first()->makeHidden(['password']);

        if ($usuario == null)
            return response('', 404);


        return response($usuario, 200);

    }

    public function listar()
    {
        $usuario = User::select('id', 'name', 'email', 'id_arquivo')->get();


        for($i=0;$i<count($usuario);$i++){
            if(isset($usuario[$i]->id_arquivo) && $usuario[$i]->id_arquivo != null ){
                $arquivo = Arquivos::where('id', $usuario[$i]->id_arquivo)->first();
                // $usuario->img = $arquivo->caminho . $arquivo->nome_criptografado . ".png"; 
                $usuario[$i]->img = $arquivo->caminho . $arquivo->nome_criptografado; 
            }
            else {
                $usuario[$i]->img = null;
            }
        }

        return response($usuario, 200);

    }

    public function deletar($id)
    {
        $usuario = User::where('id', $id)->first();

        if ($usuario == null)
            return response('', 404);

        $usuario->deleted_by = auth()->id();
        $usuario->save();

        $usuario->delete();

        return response('', 200);

    }

    public function editar(Request $request, $id)
    {
        // dd($id, $request->all());

        $usuario = User::where('id', $id)->first();
        $usuario->email = $request->email;
        $usuario->name = $request->name;
        $usuario->id_arquivo = $request->id_arquivo;

        $usuario->password = bcrypt($request->password);
        $usuario->updated_by = auth()->id();
        $usuario->save();


        return response($usuario, 200);
    }

    public function editarParcial(Request $request, $id)
    {
        // dd($id, $request->all());

        $usuario = User::where('id', $id)->first();
        if(isset($request->email))
            $usuario->email = $request->email;
    
        if(isset($request->name))
            $usuario->name = $request->name;

        if(isset($request->id_arquivo))
            $usuario->id_arquivo = $request->id_arquivo;


        if(isset($request->password))
            $usuario->password = bcrypt($request->password);
    
        $usuario->updated_by = auth()->id();
        $usuario->save();


        return response($usuario, 200);
    }

    public function filtrar(Request $request){
        //email, nome ou created_by

        $usuario = User::whereRaw('1=1');


        if(isset($request->created_by)){
            $usuario->where('created_by', $request->created_by);
        }

        if(isset($request->email)){
            $usuario->where('email', 'like', "%$request->email%");
        }

        if(isset($request->name)){
            $usuario->where('name', 'like', "%$request->name%");
        }

        // dd($usuario->toSql());

        $usuario = $usuario->get();

        return response($usuario, 200);

    }


}
