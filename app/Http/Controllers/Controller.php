<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function temPermissao($args){

        
        if(auth()->user()->permissao == 'administrador'){
            return true;
        }

        if(in_array(auth()->user()->permissao, $args)){
            return true;
        }


        abort(403,auth()->user()->permissao . ' nao tem permissao pra esse recurso.');
        


    }



}
