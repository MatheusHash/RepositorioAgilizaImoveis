@extends('layouts.admin')

@section('content')
@include('admin.localidades.form')
    <section class="bg-indigo-50">

            <div id="div1"></div>
        <div class="w-full p-6">

            <div class="border-indigo-500  w-full" style="justify-content:center;">
                @if($municipios)
                    <h1>Municipios</h1>
                    <hr>

                    @foreach($municipios as $municipio )
                        <h1 class="border-indigo-500 p-2">{{$municipio->nome}}</h1>
                        @forelse ($municipio->bairros as $key => $bairro)
                            <span class="border-indigo-500 p-2">{{$key+1}} - {{$bairro->nome}}</span>
                            <br>
                        @empty
                            <p class="border-indigo-500 p-2">Nenhum bairro cadastrado ...</p>
                        @endforelse
                        <br>
                    @endforeach
                @endif
            </div>

        </div>
    </section>
{{--
    <script>

        function getBairrosDeUmaCidade(cidade){

            fetch(`http://localhost:8000/api/municipios/${cidade}/bairros`).then(function (response) {
                // The API call was successful!
                return response.json();
            }).then(function (data) {
                // This is the JSON from our response
                // console.log(data);
                var atualDiv = null;
                var novoConteudo = null;
                data.forEach(element => {
                    console.log(element)
                        atualDiv = document.querySelector("#div1")
                        novoConteudo = document.createTextNode(
                        ` cod: ${element.id} nome:${element.nome} `
                        )
                        atualDiv.appendChild(novoConteudo)

                });

            }).catch(function (err) {
                // There was an error
                console.warn('Something went wrong.', err);
            });
        }

        getBairrosDeUmaCidade(2);
    </script>
 --}}
@endsection
