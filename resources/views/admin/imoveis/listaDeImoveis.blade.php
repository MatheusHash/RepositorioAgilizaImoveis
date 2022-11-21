@extends('layouts.admin')

@section('content')
<section>
    <section class="bg-gray-800" >
        {{-- @dd($imoveis) --}}

        <div id="search" class="container grid col-12">
            <div class="mx-auto col-12 w-8/12">
                <form action="{{route('imoveis.show')}}" class="mx-auto grid" method="GET">
                    @csrf
                    <h4 class="text-white text-[16px] uppercase">Pesquise:
                        <span class="opacity-50">código ou título</span>
                    </h4>

                    <div class="flex gap-2">
                        <input class="rounded-[20px] h-10 w-6/12 border-orange-600" name="searchInput" type="text" />

                        <select name="searchCategory" class="rounded-[16px] w-4/12 text-orange-700 text-center border-orange-600">
                            <option disabled selected>Selecione uma categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach

                        </select>
                        <button class="font-bold bg-orange-500 text-white flex justify-center p-2 rounded-[18px]">
                            <span class="material-symbols-outlined">search</span>
                            Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if($qtd = count($imoveis))

            <div class="bg-gray-500 rounded px-5">
                <h3 class="text-center text-white text-[32px] font-bold ">Lista de imóveis</h3>
                <h5 class=" h-16 text-white text-[24px] font-semibold text-right">
                    <span class="bg-orange-600 px-4 py-1 rounded-[10px]">
                        {{$qtd }} imóveis
                    </span>

                </h5>
                <div class="text-right">
                    <a class="text-white hover:bg-gray-700 rounded-[10px]   " href="{{route('imoveis.show')}}">Ver todos</a>
                </div>
            </div>

            <section class="grid gap-4" id="list-imoveis" >

        @foreach($imoveis as $key => $imovel)

                    <div class="text-white px-8 py-4 border border-gray-700 rounded-[16px]">
                    <div class="flex justify-between">
                        <div class="grid self-start ">
                            <h3 class="text-blue-600 font-light text-[24px]">{{$imovel->titulo}}
                                <span class="text-[16px]">{ {{$imovel->id}} }</span>
                            </h3>
                            <h4 class="text-[16px]"> R$ {{number_format($imovel->valor, 2, ',', '.')}}</h4>
                        </div>
                        <div>

                            <h3 class="opacity-25 cursor-not-allowed">inserido em: {{ date('d-m-Y', strtotime($imovel->created_at))}} por: {{$imovel->corretor}}  </h3>

                        </div>
                        <span class="flex gap-2 text-blue-500 text-[18px] mr-10">

                            <h3>{{$imovel->municipio->nome }} </h3>
                            @empty(!$imovel->bairro) <span>-  {{$imovel->bairro->nome}}</span> @endempty
                        </span>
                    </div>
                    <div class="flex mx-auto  w-11/12 ">
                        <div class="w-4/12 ">
                            <img class="max-h-64 h-64 rounded-[8px]" src="{{asset($imovel->fotoPrincipal->path)}}"/>
                        </div>
                        <div class=" px-6 w-8/12 bg-gray-400 bg-opacity-5">
                            <div class="w-10/12">
                                <h3 class="text-blue-600 text-[18px]">Descrição</h3>
                                <p class="text">{!! $imovel->descricao !!}</p>
                            </div>
                            <p class="text-blue-600 mt-5">{{$imovel->endereco}} </p>
                        </div>

                        <div class="grid grid-cols-1 font-bold gap-1">
                            <button onclick="window.location.href='{{ route('galeria', $imovel->id)  }}';" class="px-3  uppercase flex justify-center items-center bg-green-600 text-white">
                            <span class="material-symbols-outlined">
                                photo_library
                            </span>
                                Galeria
                            </button>

                            <button data-tipo="visibilidade" data-value="{{$imovel->id}}" class="px-3 uppercase flex justify-center items-center bg-blue-600 text-white">
                                @if($imovel->visibility)
                                    <span data-tipo="visibilidade" data-value="{{$imovel->id}}" class="material-symbols-outlined mx-1">visibility</span>ocultar
                                @else
                                    <span data-tipo="visibilidade" data-value="{{$imovel->id}}" class="material-symbols-outlined mx-1">visibility_off</span>mostrar
                                @endif
                            </button>

                            <button onclick="window.location.href='{{ route('imoveis.edit', $imovel->id)}}';"  class="px-3  uppercase flex justify-center items-center bg-yellow-600 text-white">
                                <span class="material-symbols-outlined">edit</span>
                                Editar
                            </button>

                            <button  data-tipo="delete" data-value="{{$imovel->id}}"  class="px-3 uppercase flex justify-center items-center bg-red-600 text-white">
                                <span data-tipo="delete" data-value="{{$imovel->id}}" class="material-symbols-outlined">
                                    delete
                                </span>
                                Excluir
                            </button>

                        </div>
                    </div>
                </div>


            @endforeach

            <div class="flex justify-center">
                {{$imoveis->links()}}
            </div>
        @else
                <div class="w-full bg-red-600 rounded-[10px] p-4 flex justify-between ">
                    <span class="text-white text-lg">Não encontrado</span>
                    <a class="text-blue-300 font-bold text-[18px]" href="window.history.back()">voltar</a>
                </div>
        @endif

    </section>

    <script>
        document.getElementById('list-imoveis').addEventListener('click',(event)=> {
            event.preventDefault();
            if (event.target.tagName === 'BUTTON' || event.target.tagName === 'SPAN') {
                let btn = event.target;
                let action = btn.getAttribute("data-tipo");
                let cod = btn.getAttribute("data-value");
                if(action === 'visibilidade'){
                    let url = `/admin/imoveis/${cod}/visibilidade`
                    axios.post(url)
                        .then((res)=>{
                            if(res.status === 200 || res.status === 202) {
                                console.log('Visibilidade alterada com sucesso');
                            }
                            window.location.reload();
                        })
                        .catch((err)=>{
                            console.log(err)
                        });
                }
                if(action === 'delete'){
                    let url = `/admin/imoveis/${cod}/delete`
                    axios.post(url)
                        .then((res)=>{
                            if(res.status === 200 || res.status === 202){
                                console.log('Imóvel deletado com sucesso');
                            }
                            window.location.reload();
                        })
                        .catch((err)=>{
                            console.log(err)
                        });
                }
            }
        })
    </script>

@endsection
