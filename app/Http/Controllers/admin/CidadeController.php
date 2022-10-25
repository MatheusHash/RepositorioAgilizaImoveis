<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cidade, Municipio, Bairro, Imovel};

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

    public function trocar_tabela_cidades_para_municipios_bairros(){

        /** Rota
         * http://localhost:8000/admin/cidades/popularTabelaMunicipios
         */

        $Mensagem ='';

        $cidadesIsCidade    = Cidade::where('isCidade',1)->get();
        $bairros            = Cidade::whereNull('isCidade')->get();
        // $result = Municipio::create(['nome'=>"Cidade Teste"]);

        foreach($cidadesIsCidade as $cidade){
            $result = Municipio::create(['nome' => $cidade->nome]);
        }

        $result= new Municipio();
        $passos = $result->where('nome', 'Passos')->get();
        //dd($passos[0]->id);

        if(count($passos)){
            foreach($bairros as $bairro){
                $result = Bairro::create(['nome' => $bairro->nome,'municipio_id' => $passos[0]->id]);
            }
            $Mensagem = $Mensagem . "Cidade  s cadastradas <br> Bairros Cadastrados em Passos <br>";
        }else{
            $result = Municipio::create(['nome' => 'Passos']);
            $passos = $result->where('nome', 'Passos')->get();
            foreach($bairros as $bairro){
                $result = Bairro::create(['nome' => $bairro->nome,'municipio_id' => $passos[0]->id]);
            }
            $Mensagem = $Mensagem .  "Cidade de passos criada e outras cidades cadastradas <br> Bairros Cadastrados em Passos <br>";
        }

            $passos = Municipio::where('nome','Passos')->get();
            $imoveis = Imovel::all();
            foreach($imoveis as $imovel){
                // echo $imovel->cidade_id ."<br>";
                    // dump($imovel->cidade->id. " - " .$imovel->cidade->nome. " -> Cidade");
                    $auxCidade = Municipio::where('nome', $imovel->cidade->nome)->get();
                    // dump("AUX cidade: ". $aux[0]->nome);

                    if(count($auxCidade)){
                        $imovel->municipio_id = $auxCidade[0]->id;
                        $imovel->update();
                    }

                    // dump($imovel->cidade->id. " - " .$imovel->cidade->nome. " -> Bairro");
                    $auxBairro = Bairro::where('nome', $imovel->cidade->nome)->get();
                    // dump("AUX bairro: ". $aux[0]->nome);

                    if(count($auxBairro)){
                        $imovel->bairro_id      = $auxBairro[0]->id;
                        $imovel->municipio_id   = $passos[0]->id;
                        $imovel->update();
                    }

                    unset($auxBairro);
                    unset($auxCidade);
            }
        return $Mensagem. "<br><br>\ Final da execução /";
        // dd($imoveis);
        // dd($cidadesIsCidade, $bairros);
        // return "Erro durante o processo...";
    }

}
