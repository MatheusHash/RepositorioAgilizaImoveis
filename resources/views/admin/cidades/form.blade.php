    <section class="bg-indigo-50 justify-center flex">

        <div style="width: 80vw;" class=" items-center">
            <form action="{{route("cidades.store")}}" method="POST">
                @csrf
                <div class="flex">
                    <div class="p-2" style="width: 60vw;">
                        <h2 class="block ">Cadastrar Cidade ou Bairro</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: Penha">


                            <fieldset class="m rounded-lg mt-8 w-68">
                                <input class="mr-2" type="checkbox" name="isCidade" value="1">Cidade
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
