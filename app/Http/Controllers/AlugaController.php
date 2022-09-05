<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FiltroBuscaRequest;

use App\Models\Cidade;
use App\Models\Categoria;
use App\Models\Galeria;
use App\Models\Imovel;

class AlugaController extends Controller
{

    public function index(){
        
        return view('imoveis.index',['motivo'=>1,'imoveis'=>$imoveis,'cidades'=>$cidades,'categorias'=>$categorias]);
    }

    public function alugar(){
        $imoveis = Imovel::where('motivo',1)
                            ->where('visibility',1)
                            ->orWhere(function($query){
                            $query->where('motivo',3);
        })->get();

        $cidades = Cidade::all();
        $categorias = Categoria::all(); 
        return view('imoveis.index',['imoveis'=>$imoveis,'cidades'=>$cidades,'categorias'=>$categorias]);
    }


}
