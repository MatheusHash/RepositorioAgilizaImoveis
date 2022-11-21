@extends('layouts.admin')

@section('content')
    <div class="max-w-screen-xl  ">

        @if(count($mensagens) > 0)
             <section class="w-full grid sm:grid-cols-2 lg:grid-cols-2 justify-items-center gap-4" id="mensagens">
            @foreach($mensagens as $key => $mensagem)
                @if($mensagem->lida)
                    <div class="bg-white border-solid border-2 rounded-[10px] pt-5 pl-5 pr-5 pb-0 border-green-500 max-w-md">
                        <div class="text-green-600">
                            <div class="flex justify-between">
                                <span class="font-bold">{{$mensagem->nome}}</span>
                                <span>{{date('d-m-Y', strtotime($mensagem->created_at))}}</span>
                            </div>
                            <div class="grid">
                                <span>{{$mensagem->telefone}}</span>
                                <hr>
                                <span>{{$mensagem->email}}</span>
                            </div>
                            <div>
                                <p class="text-black">{{$mensagem->mensagem}}</p>
                            </div>

                            <div class="flex justify-end text-[18px] mt-4 gap-2">
                                <form class="ml-2" action="{{route('contato.destroy',[$mensagem->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" class="hidden" name="idMensagem" value="{{$mensagem->id}}">

                                    <button type="submit">
                                        <span class="material-symbols-outlined text-red-600">delete</span>
                                    </button>
                                </form>

                                <form action="{{route('contato.update',[$mensagem->id])}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="hidden" name="idMensagem" value="{{$mensagem->id}}">
                                    <button type="submit">
                                        <span class="material-symbols-outlined">
                                        mark_email_read
                                        </span>
                                    </button>

                                </form>
                            </div>

                        </div>
                    </div>
                     @else
                         <div class="bg-white border-solid border-2 rounded-[10px] pt-5 pl-5 pr-5 pb-0  border-blue-500 max-w-md">
                             <div class="text-blue-900">
                                 <div class="flex justify-between">
                                     <span class="font-bold">{{$mensagem->nome}}</span>
                                     <span>{{date('d-m-Y', strtotime($mensagem->created_at))}}</span>
                                 </div>
                                 <div class="grid">
                                     <span>{{$mensagem->telefone}}</span>
                                     <hr>
                                     <span>{{$mensagem->email}}</span>
                                 </div>

                                 <div>
                                     <p class="text-black">{{$mensagem->mensagem}}</p>
                                 </div>

                                 <div class="flex justify-end text-[18px] mt-4">
                                     <form class="ml-2" action="{{route('contato.destroy',[$mensagem->id])}}" method="post">
                                         @csrf
                                         @method('DELETE')
                                         <input type="text" class="hidden" name="idMensagem" value="{{$mensagem->id}}">

                                         <button type="submit">
                                             <span class="material-symbols-outlined text-red-600">delete</span>
                                         </button>
                                     </form>

                                 </div>

                             </div>
                         </div>
                     @endif
             @endforeach


            </section>

{{--            <table >--}}
{{--                        <thead>--}}
{{--                            <tr class="border-b">--}}
{{--                                <th>Data</th>--}}
{{--                                <th>Mensagem</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th>Tel</th>--}}
{{--                                <th>Ação</th>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody class="justify-center">--}}
{{--                            @foreach($mensagens as $item)--}}
{{--                            @if (!$item->lida)--}}
{{--                                <tr class="border-b text-center bg-gray-800 text-white">--}}
{{--                                    <td class="border-r border-gray-400 p-5 mr-2 ml-2">{{date('d-m-Y', strtotime($item->created_at))}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->mensagem}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->email}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->telefone}}</td>--}}
{{--                                    <td class="text-center p-5 mr-2 ml-2">--}}
{{--                                        <div class="flex">--}}
{{--                                            <form action="{{route('contato.update',[$item->id])}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">--}}
{{--                                                <button class="btn btn-azul text-white" type="submit">--}}
{{--                                                    Marcar como lida--}}
{{--                                                </button>--}}
{{--                                            </form>--}}

{{--                                            <form class="ml-2" action="{{route('contato.destroy',[$item->id])}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">--}}
{{--                                                <button class="btn btn-vermelho text-white" type="submit">--}}
{{--                                                    Deletar--}}
{{--                                                </button>--}}
{{--                                            </form>--}}

{{--                                        </div>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @else--}}
{{--                                <tr class="border-b text-center ">--}}
{{--                                    <td class="border-r border-gray-400 p-5 mr-2 ml-2">{{date('d-m-Y', strtotime($item->created_at))}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->mensagem}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->email}}</td>--}}
{{--                                    <td class="border-r p-5 mr-2 ml-2">{{$item->telefone}}</td>--}}
{{--                                    <td class="text-center p-5 mr-2 ml-2">--}}
{{--                                        <div class="flex">--}}
{{--                                            <form class="ml-2" action="{{route('contato.destroy',[$item->id])}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <input type="text" class="hidden" name="idMensagem" value="{{$item->id}}">--}}
{{--                                                <button class="btn btn-vermelho text-white" type="submit">--}}
{{--                                                    Deletar--}}
{{--                                                </button>--}}
{{--                                                <p>Mensagem lida</p>--}}
{{--                                            </form>--}}


{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endif--}}

{{--                            @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
        @else
            <div class="w-full bg-red-600 rounded-[10px] p-4">
                <span class="text-white text-lg">Não possui mensagens novas.</span>

            </div>
        @endif

    </div>

@endsection
