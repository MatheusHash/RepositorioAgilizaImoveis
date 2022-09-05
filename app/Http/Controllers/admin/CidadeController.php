<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index(){
        $cidades = Cidade::where('isCidade',1)->get();
        $bairros = Cidade::where('isCidade',null)->get();

        // dd($cidades, $bairros);
        // $bairros = Cidade::where('isCidade','!=',1)->get();
        // dd($cidades, $bairros);
        // $cidades = Cidade::all();
        // dd($cidades);
        return view("admin/cidades/cidade",['cidades'=>$cidades,'bairros'=>$bairros]);
    }

    public function store(Request $request){

        // if($request->cidade){
        //     dd($request->all());
        // }
        // else{
        //     dd('null',$request->all());
        // }
        Cidade::create($request->all());
        return back();
    }
}
