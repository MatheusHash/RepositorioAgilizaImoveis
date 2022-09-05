@extends('layouts.admin')

@section('content')
@include('admin.categorias.form')
    <section class="bg-indigo-50 ">
        <div class="border-indigo-500 ml-12" style="justify-content:center;">
            
            @if($categorias)
                @foreach($categorias as $categoria )
                        <span class="border-indigo-500 p-2">{{$categoria->id}} |</span>
                        <span class="border-indigo-500 p-2">{{$categoria->nome}}</span>
                        <hr>
                        <br>
                @endforeach
            @endif
        </div>

    </section>

@endsection
