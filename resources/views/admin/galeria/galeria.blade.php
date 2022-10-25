@extends('layouts.admin')

@section('content')

    <div class="bg-gray-800 rounded-lg p-6" id="novas-imagens">
        <form action="{{route('store.images')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="max-w-xl" id="form-galeria">
                <label for="imagens">Inserir imagens</label><br>
                <input type="hidden" name="imovel" value="{{$imovel}}">
                <input type="file" name="imagens[]" id="imagens" multiple>
                <p class="mt-3">Máximo de 5 imagens por vez</p>
                @if($errors->any())
                    <p class="mt-3 text-green-600">*Adicione as novas imagens</p>
                @endif
                <button type="submit" class="mt-3 btn btn-azul text-white w-full">Enviar</button>
            </div>
        </form>
        <a href="{{route('imoveis.show')}}" class=" text-center m-auto mt-3 btn btn-cinza ">Voltar</a>
    </div>

    <h1 class="text-center text-green-600 font-semibold text-lg">Galeria de fotos</h1>

<div class="galeria">
    @foreach ($imagens as $image)

        <div class="card">
            <img src="{{asset($image->path)}}" alt="Imagem" class="photo">

            <div class="caption">
                @if ($image->principal)
                    <p class="text-green-600 text-lg text-center font-semibold">Foto de capa</p>
                    {{-- <button class="btn btn-vermelho">deletar</button> --}}
                @else
                    <div class="flex justify-between text-white btn-forms">
                        <form action="{{ route('imagemCapa.update', ['idImovel'=>$image->imovel_id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" class="hidden" name="idImovel" value="{{$image->imovel_id}}">
                            <input type="text" class="hidden" name="idImagem" value="{{$image->id}}">
                            <button type="submit" class="btn btn-azul">Colocar na capa</button>
                        </form>

                        <form action="{{route('imagem.destroy', ['idImagem'=>$image->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" class="hidden" name="path" value="{{$image->path}}">
                            <button type="submit" class="btn btn-vermelho">deletar</button>
                        </form>
                    </div>

                @endif

            </div>

        </div>
    @endforeach
</div>

<a class="btn btn-cinza text-white text-center" href="{{route('imoveis.show')}}">Voltar</a>

@endsection
