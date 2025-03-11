<?php

namespace App\Http\Controllers;

use App\Models\Arquivos;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArquivosController extends Controller
{
    //

    public function salvarArquivo(Request $request)
    {
        if ($request->hasFile('arquivo')) {

            $timeStampAtual = new \DateTime();
            $timeStampAtual = $timeStampAtual->getTimestamp();

            $arquivo = $request->file('arquivo');
            $nomeDoArquivoOriginal = $arquivo->getClientOriginalName();
            $nomeDoArquivoCriptografado = $timeStampAtual . Str::random(32);

            $salvar = $arquivo->storeAs('uploads', $nomeDoArquivoCriptografado, 'local');
            $caminho = 'uploads/';

            $arquivoBd = new Arquivos();
            $arquivoBd->nome_original = $nomeDoArquivoOriginal;
            $arquivoBd->nome_criptografado = $nomeDoArquivoCriptografado;
            $arquivoBd->caminho = $caminho;
            $arquivoBd->created_by = auth()->id();
            $arquivoBd->save();

            return response($arquivoBd, 201);


        } else {

            return response('Erro', '422');
        }
    }

    public function download($id)
    {
        $arquivo = Arquivos::where('id', $id)->first();

        if ($arquivo == null) {
            return response('Bd não existe', 404);
        }

        $caminho = $arquivo->caminho . $arquivo->nome_criptografado;


        if (!Storage::fileExists($caminho)) {
            return response('Arquivo não existe', 404);
        }

        $caminho = storage_path('app/') . $arquivo->caminho . $arquivo->nome_criptografado;
        $nomeOriginal = $arquivo->nome_original;

        return response()->download($caminho, $nomeOriginal);

    }


    // public function deletar($id)
    // {
    //     $arquivo = Arquivos::where('id', $id)->first();

    //     if ($arquivo == null) {
    //         return response('Bd não existe', 404);
    //     }

    //     $arquivo = Arquivos::where('id', $id)->delete();

    //     response($arquivo, 200);
    // }

    public function deletarDeVerdade($id)
    {
        $arquivo = Arquivos::where('id', $id)->first();
        $arquivo->deleted_by = auth()->id();
        $arquivo->save();


        if ($arquivo == null) {
            return response('Bd não existe', 404);
        }

        $caminho = $arquivo->caminho . $arquivo->nome_criptografado;

        if (!Storage::fileExists($caminho)) {
            return response('Arquivo não existe', 404);
        }


        Storage::delete($caminho);
        $arquivo = Arquivos::where('id', $id)->delete();


        response($arquivo, 200);
    }

}
