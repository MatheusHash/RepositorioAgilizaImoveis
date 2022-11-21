@extends('layouts.admin')

@section('content')
@include('admin.localidades.form')
    <section class="bg-gray-800 rounded-b-2xl">

            <div id="div1"></div>
        <div class="w-full p-6 mt-4">

            <div class="border-indigo-500  w-full" >
                @if($municipios)
                    <h1 class="text-center text-gray-400 font-semibold text-2xl border-solid border-b-2 border-gray-400" >Municípios e Bairros</h1>

                <div class="mt-6">
                    @foreach($municipios as $municipio )
                        <h1 class="text-[26px] text-white font-medium p-2">{{$municipio->nome}}</h1>
                        <div class="grid grid-cols-4 border-solid  border-b-blue-400">
                            @forelse ($municipio->bairros as $key => $bairro)
                                <span class="text-gray-300 text-[18px] gap-2 p-2 flex">{{$key+1}} - <h4 class="text-">{{$bairro->nome}}</h4></span>
                            @empty
                                <p class="bg-red-700  rounded-lg text-white p-2">Nenhum bairro cadastrado!</p>
                            @endforelse
                        </div>

                        <br>
                    @endforeach
                </div>

                @endif
            </div>

        </div>
    </section>

@endsection
