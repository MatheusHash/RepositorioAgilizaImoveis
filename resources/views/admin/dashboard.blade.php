@extends('layouts.admin')

@section('content')
    <div class="">

        @if(count($mensagens) > 0)
            <table >
                        <thead>
                            <tr class="border-b">
                                <th>Data</th>
                                <th>Mensagem</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody class="justify-center">
                            @foreach($mensagens as $item)
                            @if (!$item->lida)
                                <tr class="border-b text-center bg-gray-800 text-white">
                                    <td class="border-r border-gray-400 p-5 mr-2 ml-2">{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->mensagem}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->email}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->telefone}}</td>
                                    <td class="text-center p-5 mr-2 ml-2">
                                        <div class="flex">
                                            <form action="{{route('contato.update',[$item->id])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">
                                                <button class="btn btn-azul text-white" type="submit">
                                                    Marcar como lida
                                                </button>
                                            </form>

                                            <form class="ml-2" action="{{route('contato.destroy',[$item->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">
                                                <button class="btn btn-vermelho text-white" type="submit">
                                                    Deletar
                                                </button>
                                            </form>

                                        </div>

                                    </td>
                                </tr>
                            @else
                                <tr class="border-b text-center ">
                                    <td class="border-r border-gray-400 p-5 mr-2 ml-2">{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->mensagem}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->email}}</td>
                                    <td class="border-r p-5 mr-2 ml-2">{{$item->telefone}}</td>
                                    <td class="text-center p-5 mr-2 ml-2">
                                        <div class="flex">
                                            <form class="ml-2" action="{{route('contato.destroy',[$item->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">
                                                <button class="btn btn-vermelho text-white" type="submit">
                                                    Deletar
                                                </button>
                                                <p>Mensagem lida</p>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
        @else
            <p class="text-center text-red-600 text-lg">Não possui mensagens novas.</p>
        @endif

    </div>

@endsection
