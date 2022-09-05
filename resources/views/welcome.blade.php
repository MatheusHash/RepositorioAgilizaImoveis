@includeFirst(['template.top'])

<div id="container-page">

    <div id="area-filtro-inicial" style="background-image: url(imgs/img01.jpg);">

        <div id="container-filtro-inicial">

            <h6>A agilidade e segurança que você precisa e merece!</h6>

            <form action="{{route('imoveis.filtrados.home')}}" method="GET">
                @csrf
                <div id="selects-filtro-inicial">

                    <div class="select-filtro-inicial" id="filtro-transacao">

                        <h5>
                            Tipo
                            <i>
                                <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.85 257.57"><path d="M225.92,354.71a31.59,31.59,0,0,1-22.37-9.27L9.27,151.16A31.64,31.64,0,0,1,54,106.41l171.9,171.91L397.83,106.41a31.64,31.64,0,0,1,44.74,44.75L248.29,345.45A31.54,31.54,0,0,1,225.92,354.71Z" transform="translate(0 -97.14)"/></svg>
                            </i>
                        </h5>

                        <input name="motivo" type="hidden" id="tipo-transacao">

                        <div class="box-select-filtro">
                            <div class="slider-filtros" id="slider-filtros-1">
                                <ul>
                                    <li><a data-value="2" data-tipo="Comprar">Comprar</a></li>
                                    <li><a data-value="1" data-tipo="Alugar">Alugar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="select-filtro-inicial" id="filtro-tipo">

                        <h5>
                            Imóvel
                            <i>
                                <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.85 257.57"><path d="M225.92,354.71a31.59,31.59,0,0,1-22.37-9.27L9.27,151.16A31.64,31.64,0,0,1,54,106.41l171.9,171.91L397.83,106.41a31.64,31.64,0,0,1,44.74,44.75L248.29,345.45A31.54,31.54,0,0,1,225.92,354.71Z" transform="translate(0 -97.14)"/></svg>
                            </i>
                        </h5>

                        <input name="categoria" type="hidden" id="tipo-imovel">

                        <div class="box-select-filtro">
                            <div class="slider-filtros" id="slider-filtros-2">
                                <ul>
                                    @foreach ($categorias as $categoria)
                                        <li><a data-value="{{$categoria->id}}" data-tipo="{{$categoria->nome}}">{{$categoria->nome}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="select-filtro-inicial" id="filtro-bairro">

                        <h5>
                            Localização
                            <i>
                                <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.85 257.57"><path d="M225.92,354.71a31.59,31.59,0,0,1-22.37-9.27L9.27,151.16A31.64,31.64,0,0,1,54,106.41l171.9,171.91L397.83,106.41a31.64,31.64,0,0,1,44.74,44.75L248.29,345.45A31.54,31.54,0,0,1,225.92,354.71Z" transform="translate(0 -97.14)"/></svg>
                            </i>
                        </h5>

                        <input name="bairro" type="hidden" id="tipo-bairro">

                        <div class="box-select-filtro">
                            <div class="slider-filtros" id="slider-filtros-3">
                                <ul>
                                    <li>Cidades</li>
                                    @foreach ($cidades as $cidade)
                                        <li><a data-value="{{$cidade->id}}" data-tipo="{{$cidade->nome}}">{{$cidade->nome}}</a></li>
                                    @endforeach
                                    <br>
{{--  --}}
                                    <li>Bairros</li>
                                    @foreach ($bairros as $bairro)
                                        <li><a data-value="{{$bairro->id}}" data-tipo="{{$bairro->nome}}">{{$bairro->nome}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>


                    <input name="codigo" type="text" id="codigo" name="codigo" placeholder="Buscar por código">

                    <input type="submit" value="Buscar" onClick="">
                    {{-- <input type="button" value="Buscar" onClick=""> --}}

                    <script>
                        $(document).ready(function() {

                        'use strict';

                            $(".select-filtro-inicial").each(function(index, select) {

                                var inputValue = $(this);

                                $(select).find(" h5 ").click(function() {

                                    $(this).parent().toggleClass('show');

                                });

                                $(select).find(" a ").click(function() {

                                    $('.slider-filtros ul li a').removeClass('ativo');

                                    $(this).addClass('ativo');

                                    inputValue.find('h5').html($(this).data('tipo') + '<i><svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.85 257.57"><path d="M225.92,354.71a31.59,31.59,0,0,1-22.37-9.27L9.27,151.16A31.64,31.64,0,0,1,54,106.41l171.9,171.91L397.83,106.41a31.64,31.64,0,0,1,44.74,44.75L248.29,345.45A31.54,31.54,0,0,1,225.92,354.71Z" transform="translate(0 -97.14)"></path></svg></i>')

                                    inputValue.find("input[type='hidden']").val($(this).data('value'));

                                    inputValue.removeClass('show');

                                });

                            });

                            $(window).scroll(function(){

                                $(".select-filtro-inicial").removeClass('show');

                            });

                            //if(window.innerWidth > 768){

                                $(document).on('click', function (e) {

                                    if (!$(e.target).closest('#filtro-transacao').length){
                                        $('#filtro-transacao').removeClass('show');
                                    }

                                    if (!$(e.target).closest('#filtro-tipo').length){
                                        $('#filtro-tipo').removeClass('show');
                                    }

                                    if (!$(e.target).closest('#filtro-bairro').length){
                                        $('#filtro-bairro').removeClass('show');
                                    }

                                });
                            //}

                        });
                    </script>
                    @if($errors->any())
                        <p class="text-warning">*Escolha um tipo</p>
                    @endif
                </div>
            </form>

        </div>

    </div>

    <div id="quem-somos">
        <div class="container">

            <div id="container-quem-somos">

                <div id="area-texto-quem-somos">

                    <h5>Conheça um pouco da história da Agiliza Imóveis</h5>

                    <div id="texto-quem-somos">
                        <p>
                            A Agiliza Imóveis é uma imobiliária construída acerca de valores indispensáveis que se resumem à, acima de tudo, realizar sonhos, promover indescritível felicidade à famílias que anseiam por um lar compatível com suas necessidades e desejos, e, é claro, auxiliar até mesmo aqueles que buscam por uma localização perfeita para a concretização de seu desejo de empreender. <br><br>

                            Nosso maior objetivo é fazer com que a mudança para um novo imóvel seja não apenas uma transferência de propriedade, mas a transformação para uma nova vida, o reescrever de uma nova história, o despertar de inéditas oportunidades.  <br><br>

                            Fundada no ano de 2014 pela empresária e corretora Claudia De Simoni Lemos (Kau), a missão da Agiliza Imóveis é, desde sempre ser a sua porta de entrada para a realização e nascimento de novos - e maiores - sonhos.<br><br>

                            Kau foi a primeira representação feminina de corretagem de imóveis no mercado da cidade de Passos, sendo assim uma figura pioneira frente ao reconhecimento da importância das mulheres nesse ramo, assim como em tantos outros. Com base nisso, a imobiliária conta hoje por uma equipe totalmente composta por corretoras, uma forma de reforçar a essência da marca como uma empresa com força feminina presente.  <br><br>

                            A Agiliza Imóveis está atualmente localizada na Rua Sete de Setembro, nº 78, no centro da cidade de Passos (bem pertinho de você). <br><br>

                            CRECI/MG: 5447
                        </p>
                    </div>

                    <script>
                        $(document).ready(function(){

                            var click_texto = 0;

                            $('#bt-leia-mais').find('a').click(function(){
                                if(click_texto === 0){
                                    $('#texto-quem-somos').css({height: $('#texto-quem-somos').find('p').height()});
                                    click_texto = 1;
                                }else{
                                    $('#texto-quem-somos').css({height: 330});
                                    click_texto = 0;
                                }

                            })
                        })
                    </script>

                    <div id="bt-leia-mais">
                        <a>Leia mais</a>
                    </div>

                </div>

                <figure>
                    <img src="{{asset('imgs/img02.jpg')}}" alt="">
                </figure>

                <div id="valores-empresa">

                    <h5>Cultura e valores da empresa</h5>
                    <h6>
                        A Agiliza Imóveis preza muito pelo atendimento ao cliente, tarefa que não se resume apenas à venda de uma simples propriedade, mas à entrega de uma experiência que vai dar início à nova etapa de uma vida. Ajudamos a construir sonhos, e essa é uma responsabilidade e tanto!
                    </h6>

                    <ul>
                        <li>
                            <span>
                                <figure>
                                    <svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x37_0_x2C__Eye_x2C__See_x2C__View_x2C__Vision"><g><path d="m503.45 249.329c-1.13-1.261-28.159-31.232-72.061-61.557-51.677-35.696-113.092-61.772-175.389-61.772-62.306 0-123.721 26.083-175.389 61.772-43.903 30.325-70.932 60.296-72.061 61.557-3.4 3.797-3.4 9.544 0 13.342 1.129 1.261 28.158 31.231 72.061 61.557 40.1 27.699 102.184 60.603 171.761 61.72 2.547.07 4.707.07 7.256 0 69.577-1.117 131.661-34.021 171.761-61.72 43.902-30.325 70.932-60.296 72.061-61.557 3.4-3.798 3.4-9.545 0-13.342zm-137.45 6.671c0 60.611-49.309 110-110 110-60.601 0-110-49.299-110-110 0-60.611 49.308-110 110-110 60.602 0 110 49.299 110 110zm-336.16-.004c10.223-10.309 32.189-31.081 62.138-51.768 19-13.124 43.186-27.488 70.735-38.668-48.988 50.516-48.922 130.429-.004 180.877-27.382-11.113-51.424-25.361-70.324-38.384-30.081-20.727-52.254-41.687-62.545-52.057zm390.182 51.776c-19 13.123-43.185 27.486-70.733 38.667 48.986-50.516 48.92-130.428.003-180.876 27.382 11.112 51.424 25.36 70.323 38.383 30.08 20.728 52.254 41.687 62.545 52.057-10.222 10.311-32.189 31.082-62.138 51.769z"/><path d="m206 256c0 27.57 22.43 50 50 50s50-22.43 50-50-22.43-50-50-50-50 22.43-50 50zm80 0c0 16.542-13.458 30-30 30s-30-13.458-30-30 13.458-30 30-30 30 13.458 30 30z"/></g></g></svg>
                                </figure>
                            </span>
                            <div>
                                <h4>Missão</h4>
                                <p>
                                    Ser a porta de entrada para a realização do sonho de quem deseja adquirir seu imóvel, proporcionando o indescritível sentimento de realização pessoal, e permitindo que o maior número de pessoas possível tenha acesso a moradia de qualidade.
                                </p>
                            </div>
                        </li>
                        <li>
                            <span>
                                <figure>
                                    <svg height="512pt" viewBox="0 0 512 512.00069" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m256.855469 178.625c7.046875 0 12.753906-5.710938 12.753906-12.753906 0-7.042969-5.707031-12.753906-12.753906-12.753906-56.347657 0-102.027344 45.679687-102.027344 102.03125 0 56.347656 45.679687 102.027343 102.027344 102.027343 56.351562 0 102.03125-45.679687 102.03125-102.027343 0-7.046876-5.710938-12.753907-12.753907-12.753907-7.042968 0-12.753906 5.707031-12.753906 12.753907 0 42.261718-34.257812 76.523437-76.523437 76.523437-42.261719 0-76.523438-34.261719-76.523438-76.523437 0-42.265626 34.261719-76.523438 76.523438-76.523438zm0 0"/><path d="m500.199219 179.394531c-2.214844-6.691406-9.433594-10.320312-16.128907-8.105469-6.539062 2.164063-10.179687 9.125-8.230468 15.730469 38.140625 121.457031-29.398438 250.835938-150.855469 288.976563-121.453125 38.140625-250.832031-29.398438-288.972656-150.855469-38.144531-121.457031 29.398437-250.835937 150.851562-288.976563 44.960938-14.117187 93.164063-14.117187 138.121094 0 6.75 2.035157 13.871094-1.785156 15.90625-8.535156 2.003906-6.648437-1.671875-13.675781-8.277344-15.824218-134.863281-42.3125-278.496093 32.714843-320.808593 167.582031-42.3125 134.863281 32.71875 278.496093 167.582031 320.808593 134.867187 42.3125 278.496093-32.714843 320.808593-167.582031 15.648438-49.875 15.648438-103.34375.003907-153.21875zm0 0"/><path d="m281.144531 91.117188c.066407-7.261719-5.511719-13.332032-12.753906-13.875-3.808594-.324219-7.621094-.648438-11.53125-.648438-98.613281 0-178.554687 79.941406-178.554687 178.554688 0 98.609374 79.941406 178.550781 178.554687 178.550781 98.609375 0 178.550781-79.941407 178.550781-178.550781 0-4.613282-.28125-9.222657-.847656-13.800782-1.019531-7-7.519531-11.847656-14.519531-10.828125-7 1.015625-11.847657 7.519531-10.832031 14.519531.039062.265626.085937.527344.140624.792969.277344 3.089844.550782 6.152344.550782 9.308594.003906 84.527344-68.515625 153.046875-153.039063 153.054687-84.527343.003907-153.046875-68.519531-153.050781-153.042968-.003906-84.523438 68.511719-153.046875 153.039062-153.050782h.003907c3.164062 0 6.230469.273438 9.3125.546876l2.390625.199218c6.664062.285156 12.296875-4.886718 12.578125-11.550781.003906-.0625.003906-.121094.007812-.179687zm0 0"/><path d="m333.378906 114.855469v45.734375l-85.539062 85.539062c-5.066406 4.894532-5.207032 12.96875-.3125 18.035156 4.894531 5.066407 12.96875 5.207032 18.035156.3125.105469-.101562.210938-.207031.3125-.3125l85.539062-85.539062h45.734376c3.382812 0 6.625-1.34375 9.019531-3.738281l76.519531-76.523438c4.980469-4.980469 4.980469-13.054687 0-18.035156-2.390625-2.390625-5.632812-3.734375-9.015625-3.734375h-38.261719v-38.261719c0-7.042969-5.710937-12.753906-12.757812-12.75-3.378906 0-6.621094 1.34375-9.011719 3.734375l-76.523437 76.523438c-2.394532 2.390625-3.738282 5.632812-3.738282 9.015625zm25.507813 5.28125 51.015625-51.015625v20.226562c0 7.042969 5.710937 12.753906 12.753906 12.753906h20.226562l-51.015624 51.015626h-32.980469zm0 0"/></svg>
                                </figure>
                            </span>
                            <div>
                                <h4>Visão</h4>
                                <p>
                                    Tornar-se uma empresa referência no mercado da região quanto à entrega de imóveis que satisfaçam as necessidades de cada proprietário, particularmente, atendendo com carinho e dedicação à família que tanto sonham com a casa própria. Promover processos cada vez mais simplificados de forma a reduzir a burocracia que chega até o consumidor/mais novo proprietário.

                                </p>
                            </div>
                        </li>
                        <li>
                            <span>
                                <figure>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 443.73"><path d="M510.03,105.47L424.69,3.07c-1.62-1.94-4.02-3.06-6.55-3.06H93.87c-2.53,0-4.93,1.12-6.55,3.06L1.98,105.47c-2.12,2.54-2.59,6.08-1.18,9.08s4.42,4.91,7.73,4.91H503.47c3.31,0,6.32-1.92,7.73-4.91,1.4-2.99,.95-6.53-1.18-9.08Zm-483.27-3.07L97.87,17.07H414.14l71.11,85.33H26.76Z"/><path d="M263.9,5.26c-1.32-3.19-4.44-5.26-7.89-5.26H93.88c-3.06,0-5.87,1.63-7.4,4.28s-1.52,5.9,.03,8.55l59.73,102.4c1.33,2.28,3.64,3.82,6.27,4.16,.37,.04,.73,.07,1.09,.07,2.25,0,4.43-.89,6.04-2.5L262.05,14.57c2.44-2.44,3.17-6.11,1.85-9.3Zm-108.5,91.81L108.73,17.07h126.68l-80.01,80.01Z"/><path d="M511.11,107.14c-1.43-2.91-4.4-4.75-7.65-4.75H8.53c-3.24,0-6.2,1.84-7.65,4.75-1.43,2.91-1.1,6.38,.87,8.96L249.22,440.37c1.61,2.12,4.12,3.36,6.78,3.36s5.17-1.25,6.77-3.36L510.24,116.1c1.97-2.58,2.3-6.05,.87-8.96Zm-255.1,313.99L25.78,119.47H486.23l-230.22,301.67Z"/><path d="M264.15,432.62L161.75,108.36c-1.13-3.55-4.41-5.96-8.14-5.96H8.54c-3.24,0-6.2,1.84-7.65,4.75-1.43,2.91-1.1,6.38,.87,8.96L249.23,440.37c1.65,2.18,4.19,3.36,6.78,3.36,1.33,0,2.68-.31,3.92-.97,3.68-1.9,5.45-6.19,4.21-10.14ZM25.78,119.47h121.57l85.81,271.74L25.78,119.47Z"/><path d="M425.54,4.28c-1.52-2.65-4.34-4.28-7.4-4.28h-162.13c-3.45,0-6.56,2.07-7.88,5.26-1.32,3.19-.59,6.86,1.85,9.3l102.4,102.4c1.6,1.61,3.78,2.5,6.03,2.5,.37,0,.73-.03,1.1-.07,2.62-.34,4.94-1.88,6.27-4.16L425.51,12.83c1.54-2.65,1.54-5.9,.03-8.55Zm-68.92,92.79L276.6,17.07h126.68l-46.67,80.01Z"/><path d="M511.13,107.16c-1.43-2.91-4.4-4.75-7.65-4.75h-145.07c-3.73,0-7.02,2.41-8.14,5.96l-102.4,324.27c-1.25,3.94,.53,8.23,4.21,10.14,1.25,.65,2.59,.96,3.92,.96,2.59,0,5.12-1.19,6.78-3.35L510.26,116.12c1.97-2.58,2.3-6.05,.87-8.96Zm-232.28,284.04L364.66,119.47h121.57l-207.38,271.74Z"/></svg>
                                </figure>
                            </span>
                            <div>
                                <h4>Valores</h4>
                                <p>
                                    Transparência, honestidade, justiça, simplicidade, equidade, empatia, flexibilidade, personalização.
                                </p>
                            </div>
                        </li>
                        <li>
                            <span>
                                <figure>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 480"><path d="M116.27,232.7c2.45-5.23,3.72-10.92,3.73-16.7,0-22.09-17.91-40-40-40s-40,17.91-40,40c0,5.77,1.28,11.47,3.73,16.7C18.52,236.91,.04,258.71,0,284.27v75.73c0,4.42,3.58,8,8,8h24v104c0,4.42,3.58,8,8,8H120c4.42,0,8-3.58,8-8h0v-104h24c4.42,0,8-3.58,8-8h0v-75.73c-.04-25.56-18.52-47.36-43.73-51.58Zm27.73,119.3h-16v-80h-16v192h-24v-112h-16v112h-24v-192h-16v80H16v-67.73c.02-20.02,16.25-36.25,36.27-36.27h6.76c4.42,0,8-3.58,8-8,0-2.31-1-4.5-2.73-6.02-5.26-4.49-8.3-11.06-8.3-17.98,0-13.26,10.75-24,24-24s24,10.74,24,24c0,6.92-3.04,13.49-8.3,17.98-3.33,2.91-3.66,7.96-.75,11.29,1.52,1.74,3.71,2.73,6.02,2.73h6.76c20.02,.02,36.25,16.25,36.27,36.27v67.73Z"/><path d="M400,32c-13.25-.01-23.99-10.75-24-24,0-4.42-3.58-8-8-8s-8,3.58-8,8c-.01,13.25-10.75,23.99-24,24-4.42,0-8,3.58-8,8s3.58,8,8,8c13.25,.01,23.99,10.75,24,24,0,4.42,3.58,8,8,8s8-3.58,8-8c.01-13.25,10.75-23.99,24-24,4.42,0,8-3.58,8-8s-3.58-8-8-8Zm-32,16.02c-2.28-3.04-4.98-5.74-8.02-8.02,3.04-2.28,5.74-4.98,8.02-8.02,2.28,3.04,4.98,5.74,8.02,8.02-3.04,2.28-5.74,4.98-8.02,8.02Z"/><path d="M472,424h-32v-24c0-4.42-3.58-8-8-8h-16V202.12l62.95-110.16c2.09-3.65,.99-8.29-2.51-10.62l-24-16c-1.84-1.21-4.09-1.62-6.24-1.14-2.15,.5-3.99,1.86-5.11,3.77l-35.84,61.44c-8.05-20.57-31.26-30.72-51.83-22.66-10.38,4.07-18.6,12.28-22.66,22.66l-35.84-61.44c-2.22-3.82-7.11-5.11-10.93-2.89-.14,.08-.28,.17-.42,.26l-24,16c-3.5,2.33-4.59,6.97-2.51,10.62l62.95,110.16v189.88h-16c-4.42,0-8,3.58-8,8h0v24h-32c-4.42,0-8,3.58-8,8h0v48h16v-40h32c4.42,0,8-3.58,8-8h0v-24h112v24c0,4.42,3.58,8,8,8h32v40h16v-48c0-4.42-3.58-8-8-8Zm-72-224v192h-24v-96h-16v96h-24V200c0-1.39-.36-2.76-1.05-3.97l-60.29-105.52,10.72-7.15,51.72,88.66c1.43,2.46,4.07,3.97,6.91,3.97h3.04c4.42,0,8-3.58,8-8,0-2.31-1-4.5-2.73-6.02-5.27-4.49-8.3-11.06-8.3-17.98,0-13.26,10.74-24,24-24s24,10.74,24,24c0,6.92-3.04,13.49-8.3,17.98-3.33,2.91-3.66,7.96-.76,11.29,1.52,1.74,3.71,2.73,6.02,2.73h3.04c2.85,0,5.48-1.51,6.91-3.97l51.72-88.66,10.72,7.15-60.29,105.52c-.69,1.21-1.05,2.58-1.05,3.97Z"/><rect x="224" y="184" width="16" height="16"/><rect x="256" y="200" width="16" height="16"/><rect x="288" y="216" width="16" height="16"/><rect x="224" y="240" width="16" height="16"/><rect x="256" y="256" width="16" height="16"/><rect x="288" y="272" width="16" height="16"/><rect x="432" y="264" width="16" height="16"/><rect x="464" y="280" width="16" height="16"/><rect x="432" y="320" width="16" height="16"/><rect x="464" y="336" width="16" height="16"/><path d="M229.11,73.84l-48.22-40c-3.4-2.82-8.44-2.35-11.26,1.05-1.21,1.46-1.86,3.29-1.84,5.18l.15,15.93H64c-4.42,0-8,3.58-8,8h0v80c0,4.42,3.58,8,8,8h32c4.42,0,8-3.58,8-8h0v-40h64v16c0,4.42,3.59,8,8.01,8,1.87,0,3.68-.66,5.11-1.85l48-40c1.83-1.52,2.88-3.78,2.88-6.16,0-2.38-1.06-4.63-2.89-6.15Zm-45.11,29.08v-6.92c0-4.42-3.58-8-8-8H96c-4.42,0-8,3.58-8,8h0v40h-16V72h104c4.42,0,8-3.57,8-7.99v-.08l-.06-6.77,27.55,22.85-27.49,22.91Z"/></svg>
                                </figure>
                            </span>
                            <div>
                                <h4>Propósito</h4>
                                <p>
                                    Trazer cada vez mais tranquilidade, segurança, praticidade e desburocratização para o processo de aquisição de um imóvel (seja residencial ou até mesmo comercial).
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

    <div id="areas-atuacao">
        <div class="container">

            <div id="texto-top-atuacao">
                <h5>Em quais áreas a Agiliza Imóveis Atua?</h5>
                <p>
                    A imobiliária trabalha com uma ampla cartela de imóveis e serviços prestados com excelência e qualidade em atendimento. Você encontra aqui pontos chave para uma negociação de sucesso - com tranquilidade e transparência!
                </p>
            </div>

            <ul>
                <li>
                    <div>
                        <figure>
                            <img src="{{asset('imgs/img03.jpg')}}" alt="">
                        </figure>
                        <h3>Casa Verde e Amarela</h3>
                    </div>
                    <p>
                        Moradia digna e de qualidade com acesso facilitado para toda a população. Um sonho que não precisa mais esperar para ser realizado.  <br><br>

                        O programa Casa Verde e Amarela garantiu as menores taxas de juros da história para o crédito imobiliário, permitindo que diversas famílias conquistassem sua casa própria.  <br><br>

                        Essa é uma grande oportunidade para o público de baixa renda que deseja conquistar sua casa própria, para enfim sair do aluguel e investir em um bem de propriedade privada.
                    </p>
                </li>
                <li>
                    <div>
                        <figure>
                            <img src="{{asset('imgs/img04.jpg')}}" alt="">
                        </figure>
                        <h3>Venda de Imóveis de Médio e Alto Padrão</h3>
                    </div>
                    <p>
                        A Agiliza Imóveis trabalha também com a venda de imóveis de médio e alto padrão nos mais diversos pontos da cidade, com localização estratégica e excelentes condições estruturais. Deseja morar em um condomínio com muita segurança e conforto? Somos a imobiliária certa para te proporcionar as melhores opções em casas e apartamentos com acabamento rico em detalhes e características únicas!

                    </p>
                </li>
                <li>
                    <div>
                        <figure>
                            <img src="imgs/img05.jpg" alt="">
                        </figure>
                        <h3>Financiamento</h3>
                    </div>
                    <p>
                        Com esse recurso, além de facilitar a compra do imóvel, você consegue mudar-se para o novo lar enquanto ainda está pagando as parcelas que melhor se encaixam no seu orçamento. Contando com a imobiliária nesse processo, você fica totalmente livre da burocracia, através de negociações bancárias totalmente intermediadas e documentação simplificada. Você não precisa lidar com nada sozinho. <br><br>

                        Além disso, você pode financiar, além de uma casa pronta para morar, a construção do seu imóvel do zero, de acordo com suas necessidades e desejos. Incrível, né?<br><br>

                        Existe sempre uma alternativa para se alcançar aquilo que você mais deseja, e a Agiliza Imóveis te ajuda a encontrá-la!

                    </p>
                </li>
                <li>
                    <div>
                        <figure>
                            <img src="imgs/img06.jpg" alt="">
                        </figure>
                        <h3>Aluguel</h3>
                    </div>
                    <p>
                        Além da venda, a imobiliária também conta com um catálogo completo de imóveis para locação, com condições especiais e asseguramento de uma relação contratual muito confiável e cheia de benefícios. Através da parceria com advogados que proporcionam todo o suporte necessário, você recebe a tranquilidade concreta de ambas as partes seguras, assessoradas e com seus direitos e deveres em dia. <br><br>

                        Casas e apartamentos disponíveis em localizações estratégicas para estudantes, famílias, e até mesmo trabalhadores com permanência temporária na região. Temos o imóvel perfeito para todos os perfis!
                    </p>
                </li>
            </ul>

        </div>
    </div>

    <div id="equipe">
        <div class="container">

            <div id="texto-top-equipe">
                <h5>
                    Conheça <br>
                    Nossa <br>
                    Equipe!
                </h5>
                <p>
                    Conheça as pessoas que fazem parte da equipe da Agiliza Imóveis, e tornam possível o atendimento tão qualificado a todos os nossos clientes.
                </p>
            </div>

            <ul>
                <h4>Time de Vendas:</h4>
                <li>
                    <div class="info-left">
                        <div>
                            <figure>
                                <img src="imgs/img07.jpg" alt="">
                            </figure>
                            <h3>Claudia De Simone Lemos - Kau</h3>
                            <span>CRECI/MG 19845</span>
                        </div>
                    </div>
                    <div class="info-right">
                        <p>
                            Claudia (Kau) é a corretora à frente da imobiliária e também profissional encarregada pela venda de imóveis de médio e alto padrão. Há mais de duas décadas atuando no mercado imobiliário, Kau foi a primeira mulher na cidade de Passos a assumir o posto de corretora de imóveis, um verdadeiro marco para o surgimento de cada vez mais representatividade feminina nesse cenário.
                        </p>
                        <span>
                            <a href="https://api.whatsapp.com/send?phone=5535999811941&text=Ol%C3%A1" target="_blank">
                                <i>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.06,0h-.13C114.78,0,0,114.82,0,256c0,56,18.05,107.9,48.74,150.05l-31.9,95.1,98.4-31.46c40.48,26.82,88.77,42.3,140.83,42.3,141.15,0,255.94-114.85,255.94-256S397.22,0,256.06,0Zm148.96,361.5c-6.18,17.44-30.69,31.9-50.24,36.13-13.38,2.85-30.85,5.12-89.66-19.26-75.23-31.17-123.68-107.62-127.46-112.58-3.62-4.96-30.4-40.48-30.4-77.22s18.66-54.62,26.18-62.3c6.18-6.3,16.38-9.18,26.18-9.18,3.17,0,6.02,.16,8.58,.29,7.52,.32,11.3,.77,16.26,12.64,6.18,14.88,21.22,51.62,23.01,55.39,1.82,3.78,3.65,8.9,1.09,13.86-2.4,5.12-4.51,7.39-8.29,11.74s-7.36,7.68-11.14,12.35c-3.46,4.06-7.36,8.42-3.01,15.94,4.35,7.36,19.39,31.9,41.54,51.62,28.58,25.44,51.74,33.57,60.03,37.02,6.18,2.56,13.54,1.95,18.05-2.85,5.73-6.18,12.8-16.42,20-26.5,5.12-7.23,11.58-8.13,18.37-5.57,6.91,2.4,43.49,20.48,51.01,24.22,7.52,3.78,12.48,5.57,14.3,8.74,1.79,3.17,1.79,18.05-4.38,35.52Z"/></svg>
                                </i>
                                35 99981-1941
                            </a>
                        </span>
                    </div>
                </li>

                <li>
                    <div class="info-left">
                        <div>
                            <figure>
                                <img src="imgs/img08.jpg" alt="">
                            </figure>
                            <h3>Juliana Freire - Ju</h3>
                            <span>CRECI/MG 37343</span>
                        </div>
                    </div>
                    <div class="info-right">
                        <p>
                            Corretora na Agiliza Imóveis desde o ano de 2019, Ju é a figura responsável pela realização de sonhos no que tange a venda de imóveis de alto, médio e baixo padrão, sejam apartamentos, casas ou até mesmo imóveis comerciais. Ela é um auxílio constante e especializado em todas as etapas e processos da venda, fazendo com que tudo se torne o mais simples e descomplicado possível.
                        </p>
                        <span>
                            <a href="https://api.whatsapp.com/send?phone=5535999027678&text=Ol%C3%A1" target="_blank">
                                <i>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.06,0h-.13C114.78,0,0,114.82,0,256c0,56,18.05,107.9,48.74,150.05l-31.9,95.1,98.4-31.46c40.48,26.82,88.77,42.3,140.83,42.3,141.15,0,255.94-114.85,255.94-256S397.22,0,256.06,0Zm148.96,361.5c-6.18,17.44-30.69,31.9-50.24,36.13-13.38,2.85-30.85,5.12-89.66-19.26-75.23-31.17-123.68-107.62-127.46-112.58-3.62-4.96-30.4-40.48-30.4-77.22s18.66-54.62,26.18-62.3c6.18-6.3,16.38-9.18,26.18-9.18,3.17,0,6.02,.16,8.58,.29,7.52,.32,11.3,.77,16.26,12.64,6.18,14.88,21.22,51.62,23.01,55.39,1.82,3.78,3.65,8.9,1.09,13.86-2.4,5.12-4.51,7.39-8.29,11.74s-7.36,7.68-11.14,12.35c-3.46,4.06-7.36,8.42-3.01,15.94,4.35,7.36,19.39,31.9,41.54,51.62,28.58,25.44,51.74,33.57,60.03,37.02,6.18,2.56,13.54,1.95,18.05-2.85,5.73-6.18,12.8-16.42,20-26.5,5.12-7.23,11.58-8.13,18.37-5.57,6.91,2.4,43.49,20.48,51.01,24.22,7.52,3.78,12.48,5.57,14.3,8.74,1.79,3.17,1.79,18.05-4.38,35.52Z"/></svg>
                                </i>
                                35 99902-7678
                            </a>
                        </span>
                    </div>
                </li>

                <li>
                    <div class="info-left">
                        <div>
                            <figure>
                                <img src="imgs/img09.jpg" alt="">
                            </figure>
                            <h3>Rozirene Ozelim - Rozi</h3>
                            <span>CRECI/MG 46787</span>
                        </div>
                    </div>
                    <div class="info-right">
                        <p>
                            Rozi é a caçula da equipe em relação a tempo de corretagem, mas não fica para trás quando o assunto é experiência! É uma profissional extremamente qualificada e fica encarregada da realização dos sonhos de quem deseja conquistar a sua casa própria. Atendendo a todos os tipos de públicos e oferecendo imóveis de diversos níveis, Rozi é também o contato direto com os protocolos de financiamento pelo programa Casa Verde e Amarela, uma alternativa facilitadora para famílias que buscam a sua primeira propriedade.

                        </p>
                        <span>
                            <a href="https://api.whatsapp.com/send?phone=5535999132621&text=Ol%C3%A1" target="_blank">
                                <i>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.06,0h-.13C114.78,0,0,114.82,0,256c0,56,18.05,107.9,48.74,150.05l-31.9,95.1,98.4-31.46c40.48,26.82,88.77,42.3,140.83,42.3,141.15,0,255.94-114.85,255.94-256S397.22,0,256.06,0Zm148.96,361.5c-6.18,17.44-30.69,31.9-50.24,36.13-13.38,2.85-30.85,5.12-89.66-19.26-75.23-31.17-123.68-107.62-127.46-112.58-3.62-4.96-30.4-40.48-30.4-77.22s18.66-54.62,26.18-62.3c6.18-6.3,16.38-9.18,26.18-9.18,3.17,0,6.02,.16,8.58,.29,7.52,.32,11.3,.77,16.26,12.64,6.18,14.88,21.22,51.62,23.01,55.39,1.82,3.78,3.65,8.9,1.09,13.86-2.4,5.12-4.51,7.39-8.29,11.74s-7.36,7.68-11.14,12.35c-3.46,4.06-7.36,8.42-3.01,15.94,4.35,7.36,19.39,31.9,41.54,51.62,28.58,25.44,51.74,33.57,60.03,37.02,6.18,2.56,13.54,1.95,18.05-2.85,5.73-6.18,12.8-16.42,20-26.5,5.12-7.23,11.58-8.13,18.37-5.57,6.91,2.4,43.49,20.48,51.01,24.22,7.52,3.78,12.48,5.57,14.3,8.74,1.79,3.17,1.79,18.05-4.38,35.52Z"/></svg>
                                </i>
                                35 99913-2621
                            </a>
                        </span>
                    </div>
                </li>

                <h4>Time de Locação:</h4>
                <li>
                    <div class="info-left">
                        <div>
                            <figure>
                                <img src="imgs/img11.jpg" alt="">
                            </figure>
                            <h3>Tiago De Simoni Marcelo - Tiago</h3>
                        </div>
                    </div>
                    <div class="info-right">
                        <p>
                            Tiago é tambem responsável pelo setor de aluguel da Agiliza, garantindo, desde o ano de 2017, que as pessoas possam viver em imóveis por locação com toda a tranquilidade e segurança merecidos. Quer alugar uma casa ou apartamento sem a menor dificuldade? Tiago é quem você precisa. Vistoria e avaliação de imóveis de maneira justa para que toda a negociação ocorra de maneira fluida e recompensadora!
                        </p>
                        <span>
                            <p>
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 311.41 311.43"><g id="Camada_2" data-name="Camada 2"><g id="Capa_1" data-name="Capa 1"><path d="M303.41,229.7,264.69,191A27.41,27.41,0,0,0,226,191l-17.6,17.6a20.77,20.77,0,0,1-29.33,0l-76.27-76.34a20.72,20.72,0,0,1,0-29.33l17.6-17.59a27.38,27.38,0,0,0,0-38.73L81.66,8A27.41,27.41,0,0,0,43,8L28.87,22a98.83,98.83,0,0,0,0,139.61L149.72,282.49a98.67,98.67,0,0,0,139.61,0l14.08-14.08A27.41,27.41,0,0,0,303.41,229.7ZM55.85,20.91a9.15,9.15,0,0,1,12.92,0l38.7,38.59a9.11,9.11,0,0,1,0,12.9L101,78.86,49.43,27.28ZM162.63,269.59,41.77,148.67a80.24,80.24,0,0,1-5-108.28L88.18,91.83a39,39,0,0,0,1.69,53.32l76.27,76.33h0a38.94,38.94,0,0,0,53.31,1.69l51.44,51.44A80.07,80.07,0,0,1,162.63,269.59ZM290.5,255.51,284.05,262l-51.62-51.62,6.45-6.45a9.14,9.14,0,0,1,12.91,0L290.5,242.6A9.14,9.14,0,0,1,290.5,255.51Z"/></g></g></svg>
                                </i>
                                35 3522-9280
                            </p>
                        </span>
                        <span>
                            <a href="https://api.whatsapp.com/send?phone=5535992049280&text=Ol%C3%A1" target="_blank">
                                <i>
                                    <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.06,0h-.13C114.78,0,0,114.82,0,256c0,56,18.05,107.9,48.74,150.05l-31.9,95.1,98.4-31.46c40.48,26.82,88.77,42.3,140.83,42.3,141.15,0,255.94-114.85,255.94-256S397.22,0,256.06,0Zm148.96,361.5c-6.18,17.44-30.69,31.9-50.24,36.13-13.38,2.85-30.85,5.12-89.66-19.26-75.23-31.17-123.68-107.62-127.46-112.58-3.62-4.96-30.4-40.48-30.4-77.22s18.66-54.62,26.18-62.3c6.18-6.3,16.38-9.18,26.18-9.18,3.17,0,6.02,.16,8.58,.29,7.52,.32,11.3,.77,16.26,12.64,6.18,14.88,21.22,51.62,23.01,55.39,1.82,3.78,3.65,8.9,1.09,13.86-2.4,5.12-4.51,7.39-8.29,11.74s-7.36,7.68-11.14,12.35c-3.46,4.06-7.36,8.42-3.01,15.94,4.35,7.36,19.39,31.9,41.54,51.62,28.58,25.44,51.74,33.57,60.03,37.02,6.18,2.56,13.54,1.95,18.05-2.85,5.73-6.18,12.8-16.42,20-26.5,5.12-7.23,11.58-8.13,18.37-5.57,6.91,2.4,43.49,20.48,51.01,24.22,7.52,3.78,12.48,5.57,14.3,8.74,1.79,3.17,1.79,18.05-4.38,35.52Z"/></svg>
                                </i>
                                35 99204 - 9280
                            </a>
                        </span>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <div class="banner-anuncie-aqui">
        <div class="container">

            <h5>Venda ou alugue seu imóvel com mais agilidade e segurança anunciando na Agiliza Imóveis.</h5>
            <span>
                <a onClick="showForm();">Anunciar Imóvel</a>
            </span>

        </div>
    </div>

    <div id="clientes">
        <div class="container">

            <div id="left-clientes">
                <h5>O que nossos clientes dizem sobre a imobiliária?</h5>
                <p>Veja de perto o que alguns de nossos clientes de longa data tem a dizer a respeito do trabalho da Agiliza Imóveis.</p>
                <span>
                    <a href="https://www.google.com/search?q=agiliza+imoveis&oq=agiliza+&aqs=chrome.0.69i59j46i175i199i512j69i57j69i60l5.1989j1j4&sourceid=chrome&ie=UTF-8#lrd=0x94b6c3cb32a5ec2d:0xf90cd9a86ca78665,1,,," target="__blank">
                        <i>
                            <svg height="511pt" viewBox="0 -10 511.98685 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m114.59375 491.140625c-5.609375 0-11.179688-1.75-15.933594-5.1875-8.855468-6.417969-12.992187-17.449219-10.582031-28.09375l32.9375-145.089844-111.703125-97.960937c-8.210938-7.167969-11.347656-18.519532-7.976562-28.90625 3.371093-10.367188 12.542968-17.707032 23.402343-18.710938l147.796875-13.417968 58.433594-136.746094c4.308594-10.046875 14.121094-16.535156 25.023438-16.535156 10.902343 0 20.714843 6.488281 25.023437 16.511718l58.433594 136.769532 147.773437 13.417968c10.882813.980469 20.054688 8.34375 23.425782 18.710938 3.371093 10.367187.253906 21.738281-7.957032 28.90625l-111.703125 97.941406 32.9375 145.085938c2.414063 10.667968-1.726562 21.699218-10.578125 28.097656-8.832031 6.398437-20.609375 6.890625-29.910156 1.300781l-127.445312-76.160156-127.445313 76.203125c-4.308594 2.558594-9.109375 3.863281-13.953125 3.863281zm141.398438-112.875c4.84375 0 9.640624 1.300781 13.953124 3.859375l120.277344 71.9375-31.085937-136.941406c-2.21875-9.746094 1.089843-19.921875 8.621093-26.515625l105.472657-92.5-139.542969-12.671875c-10.046875-.917969-18.6875-7.234375-22.613281-16.492188l-55.082031-129.046875-55.148438 129.066407c-3.882812 9.195312-12.523438 15.511718-22.546875 16.429687l-139.5625 12.671875 105.46875 92.5c7.554687 6.613281 10.859375 16.769531 8.621094 26.539062l-31.0625 136.9375 120.277343-71.914062c4.308594-2.558594 9.109376-3.859375 13.953126-3.859375zm-84.585938-221.847656s0 .023437-.023438.042969zm169.128906-.0625.023438.042969c0-.023438 0-.023438-.023438-.042969zm0 0"/></svg>
                        </i>
                        Avalie-nos no Gooogle
                    </a>
                </span>
            </div>

            <ul>
                <li>
                    <figure>
                        <img src="imgs/img14.jpg" alt="">
                    </figure>
                    <div>
                        <h6>Renato Franklin</h6>
                        <p>
                            A Agiliza Imóveis é um exemplo de atendimento humanizado e profissionalismo. Me sinto inteiramente satisfeito e realizado com tamanha prestação e gentileza demostrada por toda equipe da imobiliária.
                        </p>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="imgs/img13.jpg" alt="">
                    </figure>
                    <div>
                        <h6>Ronaldo Franklin</h6>
                        <p>
                            Estou muito satisfeito com os serviços prestados pela Agiliza. Além de exisitir uma enorme confiança entre ambas as partes, é uma tremenda experiência poder contar com a imobiliária quando se trata de locação de imóveis. Processos simplificados, burocracia reduzida e muita liberdade.
                        </p>
                    </div>
                </li>
            </ul>

        </div>
    </div>
    <div class="banner-anuncie-aqui">
        <div class="container">

            <h5>Anuncie seu imóvel na Agiliza Imóveis!</h5>
            <span>
                <a onClick="showForm();">Anunciar Imóvel</a>
            </span>

        </div>
    </div>
</div>

@include('template.bottom')
