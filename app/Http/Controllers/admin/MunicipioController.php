<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Municipio;


class MunicipioController extends Controller
{
    public function index(){
        $municipios = Municipio::orderBy('nome','asc')
                        ->with('bairros')
                        ->get();
        // $bairro = new Bairro();
        // $bairro->nome = "Aclimação";
        // $bairro->municipio_id = 2;
        // $bairro->save();

        // dd($municipios);
        // dd("View: Municipios");
        return view("admin/localidades/index",['municipios'=>$municipios]);
    }

    public function store(Request $request){
        $municipio = new Municipio();
        $municipio->nome = $request->nome;
        $municipio->save();
        // dd($request->all());
        // Municipio::create($request->all());
        return back();

    }
}
