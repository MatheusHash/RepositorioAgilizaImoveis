@extends('layouts.admin')

@section('content')
@include('admin.tags.form')
    <section class="bg-gray-800 rounded-b-2xl ">
        <div class="border-indigo-500 ml-12">
            @if($tags)
                <h1 class="mt-6 mb-8 text-center text-gray-400 font-semibold text-2xl border-solid border-b-2 border-gray-400" >Tags cadastradas</h1>

                <div class="grid grid-cols-4 border-solid  border-b-blue-400">
                    @foreach($tags as $key => $tag )
                        <span class="text-gray-300 text-[18px] gap-2 p-2 flex">{{$key+1}} - <h4 class="text-">{{$tag->nome}}</h4></span>
                    @endforeach
                </div>
            @endif
        </div>

    </section>

@endsection
