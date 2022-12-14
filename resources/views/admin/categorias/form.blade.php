    <section class="w-full bg-indigo-50 ">

        <div class=" w-full  flex justify-center ">
            <form action="{{route("categorias.store")}}" method="POST">
                @csrf
                <div class="flex">
                    <div class="p-2">
                        <h2 class="text-gray-900">Cadastrar Categoria</h2>
                        <div class="mt-1 relative rounded-md shadow-sm">

                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Categoria</label>
                            <input type="text" name="nome" id="nome" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ex.: Apartamento, Casa, Área de Lazer">

                            <x-button class="bg-blue-900 hover:bg-blue-600 p-2 mt-4 " type="submit">
                                {{ __('Cadastrar Categoria') }}
                            </x-button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
