<div class="form-group-buttons" style="display: flex">
    <button id="show-hide" onclick=MostrarOcultarForms(1)  style="background-color: white; border: solid 1px #ccc; color: black; width: 100px; heigth:20px; padding:5px;">Cadastrar Cidade</button>
    <button id="show-hide" onclick=MostrarOcultarForms(2); style="background-color: white; border: solid 1px #ccc; color: black; width: 100px; heigth:20px; padding:5px;">Cadastrar Bairro</button>
</div>

    <section style="display: none" id="formulario-cidade" class="bg-indigo-50 justify-center flex">

        <div style="width: 80vw;" class=" items-center">
            <form action="{{route("municipios.store")}}" method="POST">
                @csrf
                <div class="flex">
                    <div class="p-2" style="width: 60vw;">
                        <h2 class="block ">Cadastrar Cidade</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: São Sebastião do Paraíso ...">

                            <x-button class="p-2 mt-8 " type="submit">
                                {{ __('Cadastrar') }}
                            </x-button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <section style="display: none;" id="formulario-bairro" class="bg-indigo-50 justify-center flex">
        <div style="width: 80vw;" class=" items-center">
            <form action="{{route("bairros.store")}}" method="POST">
                @csrf
                <div class="flex">
                    <div class="p-2" style="width: 60vw;">
                        <h2 class="block ">Novo Bairro</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: Centro de Passos, Jardim Satélite ...">

                            <fieldset class="m rounded-lg mt-8">
                                @foreach($municipios as $municipio )

                                    <span style="border: solid 1px #ccc; background-color: white; margin:5px; padding:3px; border-radius: 3px">
                                        <input class="mr-2" type="radio" name="municipio" value="{{$municipio->id}}">{{$municipio->nome}}
                                    </span>
                                @endforeach
                            </fieldset>

                            <x-button class="p-2 mt-8 " type="submit">
                                {{ __('Cadastrar') }}
                            </x-button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>

    {{-- @push('js') --}}
        <script>
            function MostrarOcultarForms(tipo){
                var btn = document.querySelector('#show-hide');
                var bairro = document.querySelector('#formulario-bairro');
                var cidade = document.querySelector('#formulario-cidade');

                if(tipo == 2){
                    cidade.style.display = 'none';
                    if(bairro.style.display === 'block'){
                        bairro.style.display = 'none';
                    }else{
                        bairro.style.display = 'block';
                        bairro.style.backgroundColor = '#ccc';
                        bairro.style.margin = '15px';

                    }
                }else{
                    bairro.style.display = 'none';
                    if(cidade.style.display === 'block'){
                        cidade.style.display = 'none';
                    }else{
                        cidade.style.display = 'block';
                        cidade.style.margin = '15px';

                    }
                }
            }
        </script>
    {{-- @endpush --}}
