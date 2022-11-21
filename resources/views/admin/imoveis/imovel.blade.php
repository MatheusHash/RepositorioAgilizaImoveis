{{--directory layouts, archive app.blade.php--}}
@extends('layouts.admin')

@section('content')

@if($errors->any())
<h2 class="p-5 text-red-600">Verifique se todos os campos foram preenchidos da maneira correta!</h2>
@endif
<section class="bg-gray-700 flex justify-center rounded-[20px] shadow-lg shadow-white ">

        <div    >
            <div class=" py-12">
                <h1 class="text-[26px] text-center text-white border-b-2 border-white uppercase">Cadastrar imóvel</h1>

                <form class="text-gray-600" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center mt-6 ">
                        {{-- Titulo --}}
                        <div class="mb-4 w-1/2">
                            <label for="titulo" class=" text-[22px] text-gray-200">Título do imóvel</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="titulo" id="price" value="{{  old('titulo')  }}" class=" @error('titulo') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Casa com Area de lazer">
                                @error('titulo')
                                    <h1 class="text-red-600 ">* Verifique este campo</h1>
                                @enderror
                            </div>
                        </div>

                        {{-- Corretor --}}
                        <div class="mb-4 mb-4 w-1/2">
                            <label for="corretor" class="text-[22px] text-gray-200">Nome</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="corretor" id="corretor" value="{{  old('corretor')  }}" class=" @error('corretor') is-invalid @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Seu nome">
                                @error('corretor')
                                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                @enderror
                            </div>
                        </div>

                        {{-- Valor --}}
                        <div class="mb-4 w-1/2">
                            <label for="valor" class="text-[22px] text-gray-200" >Valor</label>
                                <input type="number"  step="0.01" name="valor" id="price" value="{{  old('valor')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="850000">
                                @error('valor')
                                    <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                @enderror
                        </div>
                    </div>

                    <span class="text-white text-[20px] text-gray-300 mt-6">Escolha as imagens</span>
                    <hr>
{{--                    Imagem Principal --}}
                    <div class="mb-4 mt-6 p-6 bg-gray-400 rounded-[15px] w-2/4">
                        <label for="imagem-principal" class="text-[20px] text-gray-700" >Foto principal - Foto de Capa</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="file" accept="image/*" name="imagem-principal" id="imagem-principal" value="{{  old('imagem-principal')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>
                        @error('imagem-principal')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

{{--                    Imagens --}}
                    <div class="mb-4 mt-6 p-6 bg-gray-400 rounded-[15px] w-2/4">
                        <label for="imagens" class="text-[20px] text-gray-700" >Escolha as melhores imagens do Imovel</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="file" accept="image/*" name="imagens[]" id="imagens" value="{{  old('imagens')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" multiple>
                        </div>
                    </div>
                    <br>
                    <hr>


                    {{--Endereco --}}
                    <div class="mb-4 w-1/2">
                        <label for="endereco" class="text-[20px] text-gray-300" >Endereço</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="endereco" id="endereco" value="{{  old('endereco')  }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Avenida Sabia, 1024">
                            @error('endereco')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>
                    </div>


{{--                    Descricao --}}
                    <div class="mb-4 w-1/2">
                        <label for="descricao" class="text-[20px] text-gray-300" >Descrição</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="descricao" rows="7"  id="descricao" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Breve Descrição sobre o ímovel...">{{  old('descricao')  }}</textarea>
                        </div>
                        @error('descricao')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    {{--                    Link do Google maps--}}
                    <div class="mb-4 w-3/4">
                        <label for="googlemaps" class="text-[20px] text-gray-300">Cole aqui o link do Google Maps</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea name="googlemaps" id="googlemaps" class="  focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="link">{{  old('googlemaps')  }}</textarea>
                        </div>
                        @error('googlemaps')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    {{--                    Comodos e areas do imovel--}}
                    <div class="mt-6 container ">

                        <h3 class="text-gray-300 text-[24px] text-center pt-8 pb-3"> Cômodos / Áreas do imóvel</h3>

                        <div class="w-full ">
                            <div class="flex">
                                <div class="mr-2">
                                    <label for="quarto" class="text-gray-300 text-[18px]">Quartos</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="quarto" id="quarto" value="{{  old('quarto')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('quarto')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>
                                <div class="mr-2">
                                    <label for="banheiro" class="text-gray-300 text-[18px]">Banheiros</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="banheiro" id="banheiro" value="{{  old('banheiro')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('banheiro')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="suite" class="text-gray-300 text-[18px]">Suíte</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="number" name="suite" id="suite" value="{{  old('suite')  }}" class="w-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('suite')
                                        <h1 class="text-red-600 ">* Campo obrigatório</h1>
                                    @enderror
                                </div>

                                <div class="mr-2">
                                    <label for="garagem" class="text-gray-300 text-[18px]">Vagas - Garagem</label>
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

                    <div class="mt-6 py-4 mb-4">
                        <div class="w-6/12 grid">
                            <label for="motivo" class="text-[20px] text-gray-300" >O imóvel esta para</label>

                            <select name="motivo" id="motivo" class="rounded-lg" onselect="">
                                <option value="1">Alugar</option>
                                <option value="2">Vender</option>
                            </select>
                        </div>
                        @error('motivo')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>


                    {{-- Municipios e Bairros --}}
                    <div class="mt-12 grid grid-cols-3 bg-gray-400 rounded-[20px] p-4">

                        <div class="w-4/6 flex flex-col">

                            <label for="municipio" class="text-[20px] text-gray-700" >Município</label>
                            <select name="municipio" class="rounded-lg">
                                <option disabled selected>Cidades</option>
                                @foreach ($municipios as $key => $municipio)
                                    <option name="municipioOption" value="{{ $municipio->id}}">{{$municipio->nome}}</option>
                                @endforeach
                            </select>
                            @error('cidade_id')
                                <h1 class="text-red-600 ">* Campo obrigatório</h1>
                            @enderror
                        </div>

                        <div class="w-4/6  flex flex-col">

                            <label for="bairro" class="text-[20px] text-gray-700" >Bairro</label>
                            <select  name="bairro" class="rounded-lg">
                                <option name="bairroOption" value=""></option>
                            </select>
                        </div>


                        <div class="w-3/6 flex flex-col">
                            <label class="text-[20px] text-gray-700" >Categoria</label>
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
                    <div class="mt-16">

                        <label class="mt-16 text-[20px] text-gray-300" >Tags</label>
                        <fieldset class="rounded-[20px] bg-gray-200 grid grid-cols-4" name="tag_id" id="tag_id"  multiple="multiple">
                            @foreach($tags as $tag)
                                <span class="text-gray-700 m-2">
                                    <input class="mr-2" type="checkbox" name="tags-op[]" value="{{ $tag->id}}">{{$tag->nome}}
                                </span>
                            @endforeach
                        </fieldset>
                        @error('tag_id')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>

                    <div class="flex flex-col items-center mt-12">
                        <label class="text-[20px] text-gray-300 w-6/12" for="visibility">Escolha a visibilidade do imóvel</label><br>
                        <select  name="visibility" id="visibility" class="rounded-lg w-6/12">
                            <option value="1">Visível</option>
                            <option value="0">Oculto</option>
                        </select>
                        @error('visibility')
                            <h1 class="text-red-600 ">* Campo obrigatório</h1>
                        @enderror
                    </div>



                    {{-- Btn para submeter o formulario --}}
                    <div class="flex justify-center" >
                        <button class="w-8/12 mt-12 bg-gray-800 text-lg rounded-lg btn-azul text-white text-center font-bold p-5 mt-6" type="submit">Cadastrar Imóvel</button>
                    </div>
            </form>
                    <script>


                        $('select[name=municipio]').change(function(){

                                // $("#bairros").html('Bairros {}')
                                let idCidade = $(this).val();
                                $.ajax({
                                    url: `/api/municipios/${idCidade}/bairros`,
                                    success: function(bairros){
                                        $('select[name=bairro]').empty();
                                        if(bairros.length > 0){

                                            $.each(bairros, function(key, value){
                                                // console.log(value)
                                                if(value){
                                                    $('select[name=bairro]').append(`<option value="${value.id}">${value.nome}</option>`);
                                                }
                                            });
                                        }else{
                                            $('select[name=bairro]').append(`<option disabled selected>Nenhum bairro desta cidade cadastrado</option>`);
                                        }

                                    },
                                    error: function(){
                                        $("#bairros").html("Error ao carregar bairros!!");
                                    },
                                });

                        })

                    </script>
            </div>
        </div>
    </section>

@endsection
