@extends('layouts.admin')

@section('content')
@include('admin.tags.form')
    <section class="bg-indigo-50 ">
        <div class="border-indigo-500 ml-12" style="justify-content:center;">
            @if($tags)
                @foreach($tags as $tag )
                        <span class="border-indigo-500 p-2">{{$tag->id}} |</span>
                        <span class="border-indigo-500 p-2">{{$tag->nome}}</span>
                        <hr>
                        <br>
                @endforeach
            @endif
        </div>

    </section>

@endsection
