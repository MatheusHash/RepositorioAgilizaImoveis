@extends('layouts.admin')

@section('content')
@include('admin.cidades.form')
    <section class="bg-indigo-50">
        <div class="w-full p-6">

            <div class="border-indigo-500  w-full" style="justify-content:center;">
                <h1>Cidades</h1>
                <hr>

                @if($cidades)
                    @foreach($cidades as $cidade )
                            <span class="border-indigo-500 p-2">{{$cidade->id}} |</span>
                            <span class="border-indigo-500 p-2">{{$cidade->nome}}</span>
                            {{-- <hr> --}}
                            <br>
                    @endforeach
                @endif
            </div>

            <div class="border-indigo-500 w-full mt-8" style="justify-content:center; ">
                <h1>Bairros</h1>
                <hr>

                @if($bairros)
                    @foreach($bairros as $bairro )
                            <span class="border-indigo-500 p-2">{{$bairro->id}} |</span>
                            <span class="border-indigo-500 p-2">{{$bairro->nome}}</span>
                            {{-- <hr> --}}
                            <br>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
