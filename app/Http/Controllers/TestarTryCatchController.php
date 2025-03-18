<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class TestarTryCatchController extends Controller
{
    //

    public function testarTryCatch()
    {
        $valor1 = 10;
        $valor2 = 0;

        try {
            if($valor2== 0){
                throw new Exception("Nao da pra divir por zero");
            }

            $resultado = $valor1 / $valor2;
            dd($resultado);
        } catch (Exception $e) {
            dd($e);
            var_dump('deu erro');
        }


    }
}
