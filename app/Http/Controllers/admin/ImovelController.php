<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SalvarAtualizarFormRequestImovel;
use App\Models\Galeria;
use App\Models\Cidade;
use App\Models\Categoria;
use App\Models\Tag;
use App\Models\Imovel;
use App\Models\Municipio;

//use Illuminate\Support\Facades\Storage;

class ImovelController extends Controller
{

    public function page(){

        $cidades = Cidade::where('isCidade',1)->get();
        $bairros = Cidade::where('isCidade',null)->get();
        $Categorias = Categoria::all('id','nome');
        $tags = Tag::all('id','nome');
        $municipios = Municipio::all();
        return view('admin/imoveis/imovel', ['cidades'=>$cidades,'bairros'=>$bairros,'Categorias'=>$Categorias,'tags'=>$tags,'municipios'=>$municipios]);
    }


    public function store(SalvarAtualizarFormRequestImovel $request){
        // dd($request->all());
        $dataForm = $request->all();
        // Inserindo no banco de dados e salvando os dados da inserção na var $imovel
        // $imovel = Imovel::create($request->all());
        $imovel= new Imovel();

        $imovel->titulo = $request->titulo;
        $imovel->motivo = $request->motivo;
        $imovel->visibility = $request->visibility;
        $imovel->valor = $request->valor;
        $imovel->endereco = $request->endereco;
        $imovel->googlemaps = $request->googlemaps;
        $imovel->descricao = $request->descricao;
        $imovel->quarto = $request->quarto;
        $imovel->banheiro = $request->banheiro;
        $imovel->suite = $request->suite;
        $imovel->garagem = $request->garagem;
        // $imovel->cidade_id = $request->cidade_id;
        $imovel->categoria_id = $request->categoria_id;
        $imovel->corretor = $request->corretor;
        $imovel->municipio_id = $request->municipio;
        $imovel->bairro_id = $request->bairro;
        $imovel->save();

        if($request->has('tags-op')){

            $tags = $dataForm['tags-op'];

            for($i=1; $i<=count($tags); $i++){
                $tag = Tag::find($i);
                $imovel->tags()->save($tag);
                unset($tag);
            }
        }

        // dd($imovel->tags);


        if($request->hasFile('imagem-principal')){
            $path = 'uploads/' . $imovel->id;

            $image = $dataForm['imagem-principal'];
            $nameImage = uniqid(date('Ymdhis') ). '.' . $image->getClientOriginalExtension();


            //=> path = 'public/uploads/{id}/IMAGE'
            $image->move($path, $nameImage);

            // $image->move(public_path($path),$nameImage);
            // $image->storeAs($path, $nameImage);

            $galeria = new Galeria();
            $galeria->path = $path. "/". $nameImage;
            $galeria->imovel_id = $imovel->id;
            $galeria->principal = 1;
            $galeria->save();
            unset($galeria);
        }

        if($request->hasFile('imagens')){
            // $path => onde as imagens srão salvas
            // cada imovel terá suas imagens salvas na pasta do seu ID
            $path = 'uploads/' . $imovel->id;
            foreach( $dataForm['imagens'] as $key => $file ){
                $image = $file;
                $nameImage = uniqid(date('Ymdhis'.$key) ). '.' . $image->getClientOriginalExtension();


                //=> path = 'public/uploads/{id}/IMAGE'
                $image->move($path, $nameImage);

                // $image->storeAs($path, $nameImage);

                $galeria = new Galeria();
                $galeria->imovel();
                $galeria->path = $path . "/". $nameImage;
                $galeria->imovel_id = $imovel->id;
                $galeria->principal = 0;
                $galeria->save();
                  unset($galeria); // esvaziar a var
            }

        }

        return redirect()->route('imoveis.show');
    }

    public function show(Request $request){
        $Categorias = Categoria::all('id','nome');

        if ($request->has('searchInput') || $request->has('searchCategory') ) {
            $imoveis = Imovel::where('id',$request->searchInput)->orWhere('titulo','like', '%'.$request->searchInput.'%')->orWhere('categoria_id',$request->searchCategory)
                ->with('municipio')
                ->with('bairro')
                ->with('fotoPrincipal')
                ->paginate(15);
            $Galeria = Galeria::all()
                ->where('principal',1);
            return response()->view('admin/imoveis/listaDeImoveis', ['imoveis'=>$imoveis,'Galeria'=>$Galeria, 'categorias'=>$Categorias]);
        }

        $imoveis = Imovel::with('municipio')
                           ->with('bairro')
                           ->with('fotoPrincipal')
                           ->paginate(10);

        $Galeria = Galeria::all()
                    ->where('principal',1);
        return view('admin/imoveis/listaDeImoveis', ['imoveis'=>$imoveis,'Galeria'=>$Galeria, 'categorias'=>$Categorias]);
    }

    public function showById($id){
        if($imovel = Imovel::find($id))
            return view('admin/imoveis/listarImovel', ['imovel'=>$imovel]);

        return redirect()->route('imoveis.show');
    }

    public function edit($id){
        $municipios = Municipio::orderBy('nome','asc')
                    ->with('bairros')
                    ->get();


        if( $imovel = Imovel::where('id',$id)->first()){
            // $Cidades = Municipio::all();
            // dd($bairros);
            $Categorias = Categoria::all();
            return view('admin/imoveis/editarImovel', ['imovel'=>$imovel,'Categorias'=>$Categorias,'municipios'=>$municipios]);
        }
            return redirect()->route('imoveis.show');
    }

    public function update(Request $request, $id){
        // dd($request->all());
        Imovel::findOrFail($request->id)->update($request->all());
        return redirect()->route('imoveis.show');
    }

    protected function visibilidade($idImovel){

        $imovel = Imovel::find($idImovel);
        // dd(Imovel::find($idImovel),$idImovel);
        if($imovel->visibility == 1){
            $imovel->visibility = 0;
            $imovel->update();
            return response()->json(['success'=>'Imóvel visível para todos!'], 200, ['headers'=>'noneheader']);

        }else{
            $imovel->visibility = 1;
            $imovel->update();
            return response()->json(['success'=>'Imóvel ocultado!'], 200, ['headers'=>'noneheader']);
        }
        return response()->json(['error'=>'Falha ao executar esta ação!'], 404,['headers'=>'noneheader']);
    }

    public function destroy($idImovel){
        Galeria::where('id',$idImovel)->delete();

        $imovel = Imovel::find($idImovel);
        $imovel->tags()->detach($imovel->tags);
        $imovel->delete();
        /**
         * Modificar a maneira de deletar o diretorio de uploads
         */
        // Storage::disk('public')->deleteDirectory('images/'. $idImovel);
        return response()->json(['success'=>'Imóvel ocultado!'], 200, ['headers'=>'noneheader']);
    }
}
