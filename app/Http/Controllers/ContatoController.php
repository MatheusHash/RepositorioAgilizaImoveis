<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

use App\Http\Requests\StoreContatoRequest;


class ContatoController extends Controller
{
    public function store(Request $request){


        // \"message\": \"SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'nome' cannot be null (SQL: insert into `contatos` (`nome`, `email`, `telefone`, `mensagem`, `lida`, `updated_at`, `created_at`) values (?, ?, ?, ?, 0, 2022-11-07 01:03:00, 2022-11-07 01:03:00))\",\n


        // return $request->data['nome'];

        $contato = new Contato();
        $contato->nome = $request->data['nome'];
        $contato->email = $request->data['email'];
        $contato->telefone = $request->data['telefone'];
        $contato->mensagem = $request->data['mensagem'];


        if($request->data['codImovel']){
            $novaMensagem = $request->data['mensagem'] . " | Codigo do Imóvel: " . $request->data['codImovel'] ." |";
            $contato->mensagem = $novaMensagem;
        }else{
            $contato->mensagem = $request->data['mensagem'];
        }
        $contato->save();
        // dd($contato);
        return response()->json($contato, 200, ['headers'=>'noneheader']);

        // return response()->json(['success'=> 'Mensagem enviada!'], 200, ['headers'=>'noneheader']);
        // dd($novaMensagem);
    }

    public function update(Request $request){
        // dd($request->idMensagem);
        $msg = Contato::find($request->idMensagem);
        $msg->lida= 1;
        $msg->update();
        return back();
    }

    public function destroy(Request $request){
        // dd($request->idMensagem);
        Contato::find($request->idMensagem)->delete();

        return back();
    }
}
