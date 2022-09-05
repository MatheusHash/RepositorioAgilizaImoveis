<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

use App\Http\Requests\StoreContatoRequest;


class ContatoController extends Controller
{
    public function store(StoreContatoRequest $request){
        Contato::create($request->all());
        return back();
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
