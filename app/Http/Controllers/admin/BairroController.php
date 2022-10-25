<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bairro;


class BairroController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $bairro = new Bairro();
        $bairro->nome = $request->nome;
        $bairro->municipio_id = $request->municipio;
        $bairro->save();
        return back();
    }

    public function bairrosDoMunicipio($cod_municipio){
        // dd($cod_municipio);
        $bairros = Bairro::where('municipio_id',$cod_municipio)
                            ->orderBy('nome','asc')
                            ->get();
        // dd($bairros);
        return $bairros;
    }
}
