<?php

namespace App\Http\Controllers;

use App\Models\ProjetoUser;
use Illuminate\Http\Request;

class ProjetoUsuarioController extends Controller
{
    //

    public function cadastrar(Request $request){
        $projetoUser = new ProjetoUser();
        $projetoUser->projeto_id = $request->projeto_id;
        $projetoUser->user_id = $request->user_id;
        $projetoUser->save();

        return response($projetoUser, 201);
    }


    public function deletar($projeto, $usuario){
        $projetoUser = ProjetoUser::where('projeto_id', $projeto)
        ->where('user_id', $usuario)
        ->delete();


        return response($projetoUser, 200);
    }

}
