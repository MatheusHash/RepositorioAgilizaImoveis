@extends('layouts.admin')

@section('content')

<section>
    <section class="bg-gray-800" >

        @if(count($imoveis))

             @foreach($imoveis as $key => $imovel)
                <div class="container p-5">
                    <div>
                        <div class="flex">
                            <div>
                                <h1 class="titulo-imovel">{{$imovel->titulo}} </h1>
                                <span class="ml-3 text-gray-500">#Cod: {{$imovel->id}}</span>
                                <span class="ml-3 text-gray-500"> Inserido em: {{ date('d-m-Y', strtotime($imovel->created_at))}}</span>

                                <span class="ml-3 text-gray-500">-- Nome: {{$imovel->corretor}}</span>
                            </div>
                        </div>
                        <hr class="w-full mb-4">
                    </div>

                    <div class="space-around ">

                        <div class="imagem-principal">

                            <img class="imagem-do-imovel" src="{{asset($imovel->galeria[0]->path)}}" alt="{{$imovel->titulo}}">

                        </div>

                        <div class="ml-3 detalhes-imovel">
                            <div>
                                <h3 class="mb-4 text-gray-400">Valor:</h3>
                                <span class="text-white">R$ @php echo number_format($imovel->valor, 2, ',', '.') @endphp</span>
                            </div>
                            <hr class="w-full mb-4">
                            <div >
                                <h3 class="text-gray-400">Descrição:</h3>
                                <span class="text-white">
                                    {!! $imovel->descricao !!}
                                </span>
                            </div>
                            <hr class="w-full mb-4">
                            <div>
                                <h3 class="text-gray-400">Endereço:</h3>
                                <span class="text-white">{{$imovel->endereco}}</span>
                            </div>
                        </div>

                        <div class="botoes-acao grid">
                            <a href="{{route('imoveis.edit', $imovel->id)}}">
                                <x-button class="ml-3 mb-4 btn btn-amarelo">
                                    {{__('Editar')}}
                                </x-button>
                            </a>
                            <a href="{{route('galeria', $imovel->id)}}">
                                <x-button class="ml-3 mb-4 btn btn-azul">
                                    {{__('Galeria')}}
                                </x-button>
                            </a>

                            <form action="{{route('imoveis.visibility', ['id'=>$imovel->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                @if($imovel->visibility)
                                    <x-button class="ml-3 mb-4 btn btn-cinza" type="submit">
                                        {{ __('Ocultar') }}
                                    </x-button>

                                @else
                                    <x-button class="ml-3 mb-4 btn btn-cinza" type="submit">
                                        {{ __('Mostrar') }}
                                    </x-button>
                                @endif
                            </form>

                            <form action="{{route('imoveis.destroy', ['id'=>$imovel->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <x-button class="ml-3 mb-4 btn btn-vermelho" type="submit">
                                    {{ __('Excluir') }}
                                </x-button>
                            </form>

                        </div>
                    </div>

                </div>
                <hr style="padding: 5px">
            @endforeach

            <div class="flex justify-center">
                {{$imoveis->links()}}
            </div>
        @else
            <p class="text-white flex justify-center p-5">
                Nenhum imóvel cadastrado!!
            </p>
        @endif

    </section>

@endsection
