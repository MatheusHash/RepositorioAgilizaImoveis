{{--directory layouts, archive app.blade.php--}}
@extends('layouts.admin')

@section('content')

<section class="bg-indigo-50 flex justify-center">

    @if($errors->any())
        <h2 class="p-5 text-gray-600">Verifique se todos os campos foram preenchidos da maneira correta!</h2>
    @endif
        <div class="grid grid-cols-1">
            <div class="w-auto py-12" style="width: 720px">
                <h1 class="text-center text-gray-600">Cadastrar imóvel</h1>

                <form class="text-gray-600" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Titulo --}}
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Título</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="titulo" id="price" value="{{  old('titulo')  }}" class=" @error('titulo') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Casa com Area de lazer">
                            @error('titulo')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Corretor --}}
                    <div class="mb-4">
                        <label for="corretor" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Nome</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="corretor" id="corretor" value="{{  old('corretor')  }}" class=" @error('corretor') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Seu nome">
                            @error('corretor')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Valor --}}
                    <div class="mb-4">
                        <label for="valor" class="block text-sm font-medium text-gray-700 " style="font-size: 2em; margin: 15px;">Valor</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number"  step="0.01" name="valor" id="price" value="{{  old('valor')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="850000">
                            @error('valor')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>
                    <span style="font-size: 2em; margin: 15px;">Escolha as imagens</span>
                    <hr>
{{--                    Imagem Principal --}}
                    <div class="mb-4">
                        <label for="imagens" class="block text-sm font-medium text-gray-700" >Foto principal - Foto de Capa</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="file" name="imagem-principal" id="capa" value="{{  old('imagem-principal')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>
                        @error('imagem-principal')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

{{--                    Imagens --}}
                    <div class="mb-4">
                        <label for="imagens" class="block text-sm font-medium text-gray-700">Escolha as melhores imagens do Imovel</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="file" name="imagens[]" id="imagens" value="{{  old('imagens')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" multiple>
                        </div>
                    </div>
                    <br>
                    <hr>


                    {{--Endereco --}}
                    <div class="mb-4">
                        <label for="endereco" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Endereço</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="endereco" id="endereco" value="{{  old('endereco')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Avenida Sabia, 1024">
                            @error('endereco')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>


{{--                    Descricao --}}
                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Descrição</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="descricao" id="descricao" class="h-20 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Breve Descrição sobre o ímovel...">{{  old('descricao')  }}</textarea>
                        </div>
                        @error('descricao')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    {{--                    Link do Google maps--}}
                    <div class="mb-4">
                        <label for="googlemaps" class="block text-sm font-medium text-gray-700" style="font-size: 2em; margin: 15px;">Cole aqui o link do Google Maps</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="googlemaps" id="googlemaps" class="h-20 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="link">{{  old('googlemaps')  }}</textarea>
                        </div>
                        @error('googlemaps')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    {{--                    Comodos e areas do imovel--}}
                    <div class=" container ">

                        <h3 class="text-gray-600 text-center pt-8 pb-3" style="font-size: 2em;"> Cômodos / Áreas do imóvel</h3>

                        <div class="w-full ">
                            <div class="flex">
                                <div class="mr-2">
                                    <label for="quarto" class="block text-sm font-medium text-gray-700">Quartos</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="quarto" id="quarto" value="{{  old('quarto')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('quarto')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>
                                <div class="mr-2">
                                    <label for="banheiro" class="block text-sm font-medium text-gray-700">Banheiros</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="banheiro" id="banheiro" value="{{  old('banheiro')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('banheiro')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="suite" class="block text-sm font-medium text-gray-700">Suíte</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="suite" id="suite" value="{{  old('suite')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('suite')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="garagem" class="block text-sm font-medium text-gray-700">Vagas - Garagem</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="garagem" id="garagem" value="{{  old('garagem')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
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
                                <option value="1">Alugar</option>
                                <option value="2">Vender</option>
                                {{-- <option value="3">Alugar ou Vender</option> --}}
                            </select>
                        </div>
                        @error('motivo')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    <div class="mx-auto flex justify-between mb-4">
                        {{-- <div>

                            <p>Bairro</p>
                            <select name="cidade_id" id="cidade_id" class="rounded-lg">
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->id}}">{{$cidade->nome}}</option>
                                @endforeach
                            </select>
                            @error('cidade_id')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div> --}}

                        <div>

                            <p>Localização</p>
                            <select name="cidade_id" id="cidade_id" class="rounded-lg">
                                <optgroup label="Cidades">
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade->id}}">{{$cidade->nome}}</option>
                                    @endforeach
                                </optgroup>
                                    <br>

                                    <optgroup label="Bairros">
                                        @foreach ($bairros as $bairro)
                                            <option value="{{ $bairro->id}}">{{$bairro->nome}}</option>
                                        @endforeach
                                    </optgroup>
                            </select>
                            @error('cidade_id')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>


                        <div>

                            <p>Categoria</p>
                            <select name="categoria_id" id="categoria_id" class="rounded-lg">
                                @foreach($Categorias as $categoria)
                                    <option value="{{ $categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>

                    {{-- Tags --}}
                    <div>

                        <p>Tags</p>
                        <fieldset name="tag_id" id="tag_id" class="rounded-lg" multiple="multiple">
                            @foreach($tags as $tag)
                                <input class="mr-2" type="checkbox" name="tags-op[]" value="{{ $tag->id}}">{{$tag->nome}}
                            @endforeach
                        </fieldset>
                        @error('tag_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    <div class="mx-auto mt-6">
                        <label for="visibility">Escolha a visibilidade do imóvel</label><br>
                        <select name="visibility" id="visibility" class="rounded-lg">
                            <option value="1">Visível</option>
                            <option value="0">Oculto</option>
                        </select>
                        @error('visibility')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>



                    {{-- Btn para submeter o formulario --}}
                    <div class="flex justify-center" >
                    <button class="w-full bg-gray-800 text-lg rounded-lg btn-azul text-white text-center font-bold p-5 mt-6" type="submit">Cadastrar Imóvel</button>
                </div>
            </form>
            </div>
        </div>
    </section>

@endsection
