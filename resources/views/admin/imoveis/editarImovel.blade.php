{{--directory layouts, archive app.blade.php--}}
@extends('layouts.admin')

@section('content')


@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<section class="bg-indigo-50 flex justify-center">

        <div class="grid grid-cols-1">
            <div class="w-auto py-12" style="width: 720px">
                <h1 class="text-center text-gray-600">Editar imóvel: #{{ $imovel->id }}</h1>

                <form class="text-gray-600" method="post" action=" {{route( 'imoveis.update', $imovel->id )}} ">
                    @method('put')
                    @csrf
                    {{-- Titulo --}}
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Titulo</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="titulo" id="price" value="{{ $imovel->titulo }}" class=" @error('titulo') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Casa com Area de lazer">
                            @error('titulo')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Corretor --}}
                    <div class="mb-4">
                        <label for="corretor" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Nome</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="corretor" id="corretor" value="{{ $imovel->corretor }}" class=" @error('corretor') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Seu nome">
                            @error('corretor')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Valor --}}
                    <div class="mb-4">
                        <label for="valor" class="block text-sm font-medium text-gray-700 " style="font-size: 2em; margin: 15px;">Valor</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number"  step="0.01" name="valor" id="price" value="{{  $imovel->valor  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="1050,50">
                            @error('valor')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>


                    {{--Endereco --}}
                    <div class="mb-4">
                        <label for="endereco" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Endereço</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="endereco" id="endereco" value="{{  $imovel->endereco  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                            @error('endereco')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>


{{--                    Descricao --}}
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Descrção</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="descricao" id="descricao"  class="h-20 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Breve Descrição sobre o ímovel...">{{  $imovel->descricao  }}</textarea>
                        </div>
                        @error('descricao')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>


                    {{--                    Link do Google maps--}}
                    <div class="mb-4">
                        <label for="googlemaps" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Cole aqui o link do Google Maps</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="googlemaps" id="googlemaps" class="h-20 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="link">{{  $imovel->googlemaps  }}</textarea>
                        </div>

                    </div>

                    {{--                    Comodos e areas do imovel--}}
                    <div class=" container ">

                        <h3 class="text-gray-600 text-center pt-8 pb-3" style="font-size: 2em;"> Comodos / Áreas do imovel</h3>

                        <div class="w-full ">
                            <div class="flex">
                                <div class="mr-2">
                                    <label for="quarto" class="block text-sm font-medium text-gray-700">Quartos</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="quarto" id="quarto" value="{{  $imovel->quarto  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="3">
                                    </div>
                                    @error('quarto')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>
                                <div class="mr-2">
                                    <label for="banheiro" class="block text-sm font-medium text-gray-700">Banheiros</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="banheiro" id="banheiro" value="{{  $imovel->banheiro  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="2">
                                    </div>
                                    @error('banheiro')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="suite" class="block text-sm font-medium text-gray-700">Suíte</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="suite" id="suite" value="{{  $imovel->suite  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="1">
                                    </div>
                                    @error('suite')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="garagem" class="block text-sm font-medium text-gray-700">Vagas - Garagem</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="garagem" id="garagem" value="{{  $imovel->garagem  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="1">
                                    </div>
                                    @error('garagem')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class=" py-4 mb-4">
                        <div class="mx-auto">
                            <p>O imóvel está para</p>
                            <select name="motivo" id="motivo" class="rounded-lg" onselect="">
                                <option value="1" {{ 1 == $imovel->motivo ? 'selected' : '' }}>Alugar</option>
                                <option value="2" {{ 2 == $imovel->motivo ? 'selected' : '' }}>Vender</option>
                                {{-- <option value="3" {{ 3 == $imovel->motivo ? 'selected' : '' }}>Alugar ou Vender</option> --}}
                            </select>
                        </div>
                        @error('motivo')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>


                    {{-- Municipios e Bairros --}}
                <div class="flex justify-between mb-4">

                    <div>

                        <p>Municipios</p>
                        <select name="municipio_id" class="rounded-lg">
                            <option disabled selected>Cidades</option>
                            @foreach ($municipios as $key => $municipio)
                                <option name="municipioOption" value="{{ $municipio->id}}" {{ $municipio->id == $imovel->municipio_id ? 'selected' : '' }}>{{$municipio->nome}}</option>
                            @endforeach
                        </select>
                        @error('cidade_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    <div>

                        <p>Bairros</p>
                        <select style="width: 300px;" name="bairro_id" class="rounded-lg">
                            <option name="bairroOption" value=""></option>
                        </select>
                    </div>
                </div>

                    {{-- <div>

                        <p>Bairro</p>
                        <select name="cidade_id" id="cidade_id" class="rounded-lg">
                            @foreach($Cidades as $cidade)
                                <option value="{{ $cidade->id}}"  {{ $cidade->id == $imovel->cidade_id ? 'selected' : '' }}>{{$cidade->nome}}</option>
                            @endforeach
                        </select>
                        @error('cidade_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div> --}}

                    <div>

                        <p>Categoria</p>
                        <select name="categoria_id" id="categoria_id" class="rounded-lg">
                            @foreach($Categorias as $categoria)
                                <option value="{{ $categoria->id}}" {{ $categoria->id == $imovel->categoria_id ? 'selected' : '' }} >{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>
                </div>

                <div class="mx-auto flex justify-between">



                    <div class="mx-auto mt-6">
                        <label for="visibility">Escolha a visibilidade do imóvel</label><br>
                        <select name="visibility" id="visibility" class="rounded-lg">
                            <option value="1">Visivel</option>
                            <option value="0">Oculto</option>
                        </select>
                        @error('visibility')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>
                </div>
                    {{-- Btn para submeter o formulario --}}
                        <button class="w-full text-lg  bg-gray-800 rounded-lg btn-azul text-white text-center font-bold p-5 mt-6" type="submit">Atualizar</button>
                        <a href="{{url()->previous()}}" class="w-full bg-gray-800 text-lg rounded-lg btn-cinza text-white text-center font-bold p-5 mt-6">Cancelar</a>

                </form>
            </div>
        </div>
    </section>

    <script>


        $('select[name=municipio_id]').change(function(){

                // $("#bairros").html('Bairros {}')
                var idCidade = $(this).val();
                $.ajax({
                    url: `/api/municipios/${idCidade}/bairros`,
                    success: function(bairros){
                        $('select[name=bairro_id]').empty();
                        if(bairros.length > 0){

                            $.each(bairros, function(key, value){
                                // console.log(value)
                                if(value){
                                    $('select[name=bairro_id]').append(`<option value="${value.id}">${value.nome}</option>`);
                                }
                            });
                        }else{
                            $('select[name=bairro_id]').append(`<option disabled selected>Nenhum bairro desta cidade cadastrado</option>`);
                        }

                    },
                    error: function(){
                        $("#bairros").html("Error ao carregar bairros!!");
                    },
                });

        })

    </script>

@endsection
