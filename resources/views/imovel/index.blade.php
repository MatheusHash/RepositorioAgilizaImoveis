@includeFirst(['template.top'])

<div id="container-page" class="interna2">

    <div class="container">

        <div id="tit-qtd-imoveis">
            <h6>{{$imovel->titulo}}</h6>
            <span>
                R$@php echo number_format($imovel->valor, 2, ',', '.') @endphp<br>
            </span>
        </div>

        <div id="container-imovel">

            <div id="left-imovel">

                <div id="container-slider-imovel">

                    <div id="slider-imovel">

                        <div class="swiper-wrapper">
                            @foreach ($imagens as $imagem)
                                    <div class="swiper-slide">
                                        <a><img src="{{asset($imagem->path )}}" alt="TESSS"></a>
                                    </div>
                            @endforeach

                        </div>

                    </div>

                    <div id="navs-slider-imovel">
                        <a id="prev-imovel">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 289.04 492"><path d="M97.13,246.1L281.18,62.04c5.07-5.06,7.86-11.82,7.86-19.02s-2.79-13.97-7.86-19.03l-16.13-16.12c-5.06-5.07-11.82-7.86-19.03-7.86s-13.96,2.79-19.03,7.86L7.85,227.01C2.76,232.09-.02,238.88,0,246.09c-.02,7.25,2.76,14.03,7.85,19.11l218.94,218.93c5.06,5.07,11.82,7.86,19.03,7.86s13.96-2.79,19.03-7.86l16.12-16.12c10.49-10.49,10.49-27.57,0-38.06L97.13,246.1Z"/></svg>
                        </a>
                        <a id="next-imovel">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 289.05 492"><path d="M281.2,226.8L62.25,7.86C57.19,2.79,50.43,0,43.22,0s-13.97,2.79-19.03,7.86L8.06,23.98c-10.49,10.5-10.49,27.58,0,38.06L191.92,245.9,7.86,429.96c-5.06,5.07-7.86,11.82-7.86,19.03s2.8,13.97,7.86,19.04l16.12,16.12c5.07,5.07,11.82,7.86,19.03,7.86s13.97-2.79,19.03-7.86l219.15-219.14c5.08-5.08,7.86-11.87,7.85-19.09,.02-7.24-2.77-14.03-7.85-19.11Z"/></svg>
                        </a>
                    </div>

                    <div id="pager-slider-imovel">
                    </div>

                </div>

                <div id="container-slider-imovel-miniaturas">

                    <div id="slider-imovel-miniaturas">

                        <div class="swiper-wrapper">

                            @foreach ($imagens as $imagem)
                                    <div class="swiper-slide">
                                        <a><img src="{{asset($imagem->path )}}" alt="Imagem - Agiliza Imóveis"></a>
                                    </div>
                            @endforeach

                        </div>

                    </div>

                    <div id="navs-slider-imovel-miniaturas">
                        <a id="prev-imovel-miniaturas">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 289.04 492"><path d="M97.13,246.1L281.18,62.04c5.07-5.06,7.86-11.82,7.86-19.02s-2.79-13.97-7.86-19.03l-16.13-16.12c-5.06-5.07-11.82-7.86-19.03-7.86s-13.96,2.79-19.03,7.86L7.85,227.01C2.76,232.09-.02,238.88,0,246.09c-.02,7.25,2.76,14.03,7.85,19.11l218.94,218.93c5.06,5.07,11.82,7.86,19.03,7.86s13.96-2.79,19.03-7.86l16.12-16.12c10.49-10.49,10.49-27.57,0-38.06L97.13,246.1Z"/></svg>
                        </a>
                        <a id="next-imovel-miniaturas">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 289.05 492"><path d="M281.2,226.8L62.25,7.86C57.19,2.79,50.43,0,43.22,0s-13.97,2.79-19.03,7.86L8.06,23.98c-10.49,10.5-10.49,27.58,0,38.06L191.92,245.9,7.86,429.96c-5.06,5.07-7.86,11.82-7.86,19.03s2.8,13.97,7.86,19.04l16.12,16.12c5.07,5.07,11.82,7.86,19.03,7.86s13.97-2.79,19.03-7.86l219.15-219.14c5.08-5.08,7.86-11.87,7.85-19.09,.02-7.24-2.77-14.03-7.85-19.11Z"/></svg>
                        </a>
                    </div>

                </div>

                <script>
                    const swiperImovelMiniaturas = new Swiper('#slider-imovel-miniaturas', {
                        slidesPerView: 5,
                        spaceBetween: 5,
                        freeMode: true,
                        paginationClickable: true,
                        loop: false,
                        navigation: {
                            nextEl: '#next-imovel-miniaturas',
                            prevEl: '#prev-imovel-miniaturas',
                        }
                    });

                    const swiperImovel = new Swiper('#slider-imovel', {
                        slidesPerView: 1,
                        spaceBetween: 5,
                        freeMode: true,
                        paginationClickable: true,
                        loop: false,
                        thumbs: {
                            swiper: swiperImovelMiniaturas,
                        },
                        navigation: {
                            nextEl: '#next-imovel',
                            prevEl: '#prev-imovel',
                        },
                        pagination: {
                            el: '#pager-slider-imovel',
                            clickable: true
                        }
                    });

                </script>

                <div class="info-list-imovel">
                    <h5>Preço: R$@php echo number_format($imovel->valor, 2, ',', '.') @endphp</h5>
                    <small>Código do imóvel: {{$imovel->id}}</small>
                    <h6>Descrição</h6>
                    <ul>
                        {{-- <li>
                            <figure>
                                <svg id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 480"><g id="Layer_2"><path d="M388.48,0H91.52C41.01,.09,.09,41.01,0,91.52V388.48c.09,50.51,41.01,91.43,91.52,91.52H388.48c50.51-.09,91.43-41.01,91.52-91.52V91.52C479.91,41.01,438.99,.09,388.48,0Zm59.52,388.48c-.09,32.84-26.68,59.43-59.52,59.52H91.52c-32.84-.09-59.43-26.68-59.52-59.52V91.52c.09-32.84,26.68-59.43,59.52-59.52H388.48c32.84,.09,59.43,26.68,59.52,59.52V388.48Z"/><path d="M384,269.44c-8.84,0-16,7.16-16,16v60L134.56,112h60c8.84,0,16-7.16,16-16s-7.16-16-16-16H91.04c-6.1,0-11.04,4.94-11.04,11.04h0v103.52c0,8.84,7.16,16,16,16s16-7.16,16-16v-60l233.44,233.44h-60c-8.84,0-16,7.16-16,16s7.16,16,16,16h103.52c6.1,0,11.04-4.94,11.04-11.04h0v-103.52c0-8.84-7.16-16-16-16Z"/></g></svg>
                            </figure>
                            <p>
                                <span>112 m²</span><br>
                                de área
                            </p>
                        </li> --}}
                        <li>
                            <figure>
                                <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 480.5"><path d="M480,224.35V74.75C480,33.53,446.47,0,405.25,0H104.75C63.53,0,30,33.53,30,74.75V225.8C11.79,239.6,0,261.44,0,286v194.5H90v-59H422v59h90v-194.5c0-25.44-12.66-47.97-32-61.65ZM30,360.5H482v31H30v-31ZM240,210.5H90v-7.5c0-16.54,13.46-30,30-30h90c16.54,0,30,13.46,30,30v7.5Zm180,0h-150v-7.5c0-16.54,13.46-30,30-30h90c16.54,0,30,13.46,30,30v7.5ZM60,74.75c0-24.68,20.07-44.75,44.75-44.75H405.25c24.67,0,44.75,20.07,44.75,44.75V203c0-33.08-26.92-60-60-60h-90c-17.91,0-34,7.9-45,20.38-11-12.48-27.09-20.38-45-20.38H120c-33.08,0-60,26.92-60,60V74.75Zm15.5,165.75H436.5c25.09,0,45.5,20.41,45.5,45.5v44.5H30v-44.5c0-25.09,20.41-45.5,45.5-45.5Zm-15.5,210H30v-29h30v29Zm422,0h-30v-29h30v29Z"/></svg>
                            </figure>
                            <p>
                                <span>{{$imovel->quarto}}</span><br>
                                quartos
                            </p>
                        </li>
                        <li>
                            <figure>
                                <svg id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 304.62 382.58"><path d="M287.14,158.71c-2.86-28.63-24.74-51.7-53.18-56.07C225.77,38.29,166.97-7.24,102.62,.95,43.95,8.42-.02,58.35,0,117.49v243.03c0,12.17,9.86,22.05,22.04,22.05,12.17,0,22.05-9.86,22.05-22.04V117.49c-.03-40.52,32.8-73.4,73.32-73.43,35.31-.03,65.62,25.1,72.16,59.79-25.72,6.49-44.63,28.4-47.28,54.8-4.16,.97-7.97,3.07-11.01,6.07-9.02,8.97-9.05,23.56-.08,32.58,4.34,4.36,10.23,6.8,16.38,6.79h133.96c12.73,.02,23.06-10.29,23.07-23.02,.01-10.59-7.2-19.83-17.47-22.39v.02ZM117.5,30.09c-48.25,.05-87.36,39.16-87.41,87.41v243.03c0,4.44-3.6,8.05-8.04,8.05-4.44,0-8.05-3.6-8.05-8.04h0V117.49c-.03-57.13,46.27-103.47,103.41-103.5,51.15-.02,94.63,37.33,102.32,87.9h-16.24c-7.41-41.65-43.68-71.95-85.99-71.81h0Zm52.86,100.18c7.56-7.61,17.41-12.5,28.04-13.92,2.22-.3,4.45-.46,6.69-.46h19.26c.92,0,1.82,.03,2.84,.1,23.3,1.33,42.45,18.9,45.78,42h-116.49c1.49-10.5,6.36-20.24,13.89-27.72Zm117.63,57.16c-1.71,1.71-4.03,2.67-6.44,2.68H147.58c-5.01,0-9.08-4.05-9.09-9.06,0-2.39,.96-4.69,2.66-6.38,1.7-1.71,4.02-2.68,6.44-2.68h133.96c5.01,0,9.06,4.06,9.06,9.07,0,2.38-.94,4.67-2.62,6.37h0Z"/><path d="M175.52,224.27c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M217.49,224.27c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M259.46,224.27c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M151.76,271.28c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M193.73,271.28c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M235.7,271.28c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/><path d="M277.67,271.28c-3.87,0-7,3.13-7,7v14.4c0,3.87,3.13,7,7,7s7-3.13,7-7v-14.4c0-3.87-3.13-7-7-7Z"/></svg>
                            </figure>
                            <p>
                                <span>{{$imovel->banheiro}}</span><br>
                                banheiros
                            </p>
                        </li>
                        <li>
                            <figure>
                                <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 480.5"><path d="M480,224.35V74.75C480,33.53,446.47,0,405.25,0H104.75C63.53,0,30,33.53,30,74.75V225.8C11.79,239.6,0,261.44,0,286v194.5H90v-59H422v59h90v-194.5c0-25.44-12.66-47.97-32-61.65ZM30,360.5H482v31H30v-31ZM240,210.5H90v-7.5c0-16.54,13.46-30,30-30h90c16.54,0,30,13.46,30,30v7.5Zm180,0h-150v-7.5c0-16.54,13.46-30,30-30h90c16.54,0,30,13.46,30,30v7.5ZM60,74.75c0-24.68,20.07-44.75,44.75-44.75H405.25c24.67,0,44.75,20.07,44.75,44.75V203c0-33.08-26.92-60-60-60h-90c-17.91,0-34,7.9-45,20.38-11-12.48-27.09-20.38-45-20.38H120c-33.08,0-60,26.92-60,60V74.75Zm15.5,165.75H436.5c25.09,0,45.5,20.41,45.5,45.5v44.5H30v-44.5c0-25.09,20.41-45.5,45.5-45.5Zm-15.5,210H30v-29h30v29Zm422,0h-30v-29h30v29Z"/></svg>
                            </figure>
                            <p>
                                <span>{{$imovel->suite}}</span><br>
                                suíte
                            </p>
                        </li>
                        <li>
                            <figure>
                                <svg id="Camada_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 575.04 305.32"><g id="surface1"><path d="M9.59,247.73h29.52c5.26,36.63,39.22,62.06,75.85,56.8,29.44-4.23,52.57-27.36,56.8-56.8h231.55c5.2,36.64,39.12,62.12,75.76,56.92,31.53-4.48,55.55-30.53,57.46-62.32l35.74-35.74c1.79-1.8,2.79-4.24,2.79-6.78V113.56c0-2.18-.74-4.29-2.1-5.99l-34.5-43.13,16.48-32.86c2.36-4.74,.44-10.49-4.3-12.85-1.03-.51-2.13-.84-3.27-.96l-52.28-5.51L401.42,2.38c-61.45-6.81-123.65,1.02-181.49,22.86-33.31,13.72-64.33,32.42-92.01,55.49l-18.32,15.28-13.08,7.13-60.43,23.48c-.39,.15-.76,.32-1.12,.52C13.41,138.9,0,161.48,0,186.03v52.12c0,5.29,4.29,9.58,9.59,9.58Zm95.84,38.34c-26.47,0-47.92-21.46-47.92-47.92s21.45-47.92,47.92-47.92,47.92,21.45,47.92,47.92c-.03,26.45-21.47,47.89-47.92,47.92Zm364.19,0c-26.47,0-47.92-21.46-47.92-47.92s21.46-47.92,47.92-47.92,47.92,21.45,47.92,47.92c-.04,26.45-21.47,47.89-47.92,47.92Zm86.25-134.18h-30.85l-4.79-19.17h35.64v19.17Zm-56.8-119.93l32.45,3.42-12.99,25.97c-1.67,3.35-1.24,7.35,1.1,10.28l33.54,41.93h-45.23c-5.3,0-9.58,4.29-9.58,9.59,0,.78,.09,1.56,.28,2.32l9.58,38.33c1.06,4.27,4.9,7.27,9.3,7.27h38.33v24.78l-22.23,22.23c0-.1-.09-.19-.11-.29-.95-2.9-2.09-5.72-3.42-8.46-.29-.59-.55-1.2-.86-1.79-1.38-2.67-2.94-5.25-4.66-7.71-.35-.5-.73-.96-1.08-1.45-1.67-2.27-3.47-4.42-5.42-6.45-.26-.28-.5-.58-.78-.85-2.14-2.14-4.42-4.15-6.83-5.99-.56-.42-1.1-.83-1.66-1.24-2.46-1.8-5.05-3.43-7.73-4.88-.35-.19-.74-.34-1.1-.53-2.55-1.29-5.18-2.43-7.88-3.38-.54-.19-1.05-.41-1.59-.6-2.96-.96-5.99-1.72-9.06-2.26-.65-.11-1.31-.2-1.91-.3-3.28-.53-6.6-.81-9.93-.83-2.22,0-4.41,.12-6.57,.34-.72,.07-1.42,.2-2.13,.3-1.44,.18-2.88,.37-4.27,.65-.83,.16-1.64,.38-2.46,.57-1.24,.3-2.49,.6-3.72,.96-.85,.25-1.68,.55-2.51,.83-1.16,.4-2.32,.8-3.45,1.26-.82,.34-1.64,.7-2.45,1.07-1.09,.49-2.16,.96-3.23,1.56-.8,.42-1.58,.84-2.36,1.29-1.03,.58-2.04,1.21-3.04,1.85-.76,.48-1.49,.96-2.22,1.47-.96,.69-1.91,1.41-2.87,2.15-.69,.53-1.38,1.06-2.04,1.63-.96,.8-1.83,1.64-2.72,2.48-.61,.57-1.22,1.12-1.81,1.72-.96,.96-1.78,1.91-2.66,2.87-.49,.57-.96,1.1-1.47,1.68-1.02,1.25-1.97,2.54-2.87,3.83-.26,.39-.56,.73-.82,1.11-1.15,1.71-2.22,3.47-3.21,5.28-.28,.51-.51,1.06-.78,1.59-.68,1.32-1.35,2.65-1.92,4.02-.3,.73-.57,1.47-.86,2.22-.47,1.21-.96,2.41-1.34,3.66-.27,.82-.49,1.68-.72,2.52-.34,1.2-.66,2.39-.96,3.6-.2,.9-.35,1.8-.52,2.72-.13,.73-.32,1.44-.42,2.18h-103.42l4.79-19.17h69.19v-19.1h-64.4l20.05-80.21,121.5-6.05c3.19-.16,6.09-1.9,7.74-4.64l40.41-67.38Zm-147.02-12.46c2.24,0,4.47-.14,6.71-.14,13.58-.01,27.14,.69,40.64,2.1l78.66,8.3-33.2,55.32-110.57,5.48,17.77-71.06ZM140.18,95.46c26.18-21.82,55.52-39.52,87.03-52.48,33.54-13.06,68.94-20.71,104.88-22.66l-17.81,71.26-180.18,8.99,6.08-5.11ZM19.17,186.03c-.02-17.33,9.34-33.33,24.46-41.81l58.93-22.9,206.83-10.31-19.76,79.21h-107.52v19.17h102.73l-4.79,19.17h-108.2c-.11-.74-.28-1.45-.42-2.17-.16-.96-.32-1.82-.51-2.72-.27-1.22-.6-2.41-.96-3.6-.23-.85-.45-1.7-.72-2.52-.4-1.24-.87-2.45-1.34-3.66-.3-.74-.56-1.49-.87-2.22-.59-1.37-1.26-2.7-1.91-4.02-.27-.53-.5-1.07-.79-1.59-.98-1.81-2.05-3.57-3.21-5.28-.26-.38-.56-.73-.82-1.11-.96-1.31-1.91-2.61-2.87-3.83-.47-.58-.96-1.11-1.47-1.68-.87-.96-1.74-1.98-2.66-2.88-.58-.59-1.2-1.15-1.81-1.71-.89-.85-1.78-1.69-2.72-2.48-.66-.57-1.35-1.09-2.04-1.63-.96-.74-1.92-1.45-2.87-2.14-.73-.51-1.47-.96-2.22-1.48-.96-.64-2-1.26-3.04-1.85-.78-.45-1.56-.87-2.36-1.29-1.06-.55-2.14-1.06-3.23-1.55-.82-.37-1.63-.74-2.45-1.07-1.13-.46-2.29-.86-3.45-1.27-.83-.28-1.66-.58-2.51-.83-1.23-.37-2.47-.66-3.72-.96-.82-.19-1.63-.41-2.46-.58-1.4-.28-2.83-.47-4.27-.65-.71-.09-1.41-.23-2.13-.3-2.17-.28-4.36-.4-6.57-.4s-4.41,.12-6.57,.34c-.72,.07-1.42,.2-2.13,.3-1.44,.18-2.88,.37-4.27,.65-.83,.16-1.64,.39-2.46,.58-1.24,.3-2.49,.59-3.72,.96-.85,.25-1.68,.55-2.51,.83-1.16,.41-2.32,.81-3.45,1.27-.83,.34-1.64,.7-2.45,1.07-1.09,.49-2.16,.96-3.23,1.55-.8,.42-1.58,.84-2.36,1.29-1.03,.58-2.04,1.21-3.04,1.85-.76,.48-1.49,.96-2.22,1.48-.96,.69-1.92,1.41-2.87,2.14-.69,.54-1.38,1.06-2.04,1.63-.96,.8-1.83,1.64-2.72,2.48-.28,.25-.57,.49-.82,.75H19.17v-4.2Zm0,23.37h25.71c-.36,.76-.74,1.49-1.07,2.26-.34,.76-.57,1.47-.86,2.22-.47,1.21-.96,2.41-1.34,3.66-.27,.82-.49,1.68-.72,2.52-.34,1.2-.66,2.39-.96,3.6-.2,.9-.35,1.8-.51,2.72-.14,.73-.32,1.44-.42,2.18H19.17v-19.17Z"/><path d="M230.01,123.14h47.92v19.17h-47.92v-19.17Z"/><path d="M383.36,123.14h57.51v19.17h-57.51v-19.17Z"/></g></svg>
                            </figure>
                            <p>
                                <span>{{$imovel->garagem}}</span><br>
                                vagas
                            </p>
                        </li>
                    </ul>
                    <div class="bts-list-imovel">
                        <small>Compartilhar</small>
                        <a href="https://api.whatsapp.com/send?text=Olha este imóvel incrível disponível na Agiliza Imóveis: {{route('imovel', [$imovel->id])}}" target="_blank" rel="noopener external nofollow" aria-label="Compartilhe o Imóvel {{$imovel->titulo}} no WhatsApp">
                            <svg id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.06,0h-.13C114.78,0,0,114.82,0,256c0,56,18.05,107.9,48.74,150.05l-31.9,95.1,98.4-31.46c40.48,26.82,88.77,42.3,140.83,42.3,141.15,0,255.94-114.85,255.94-256S397.22,0,256.06,0Zm148.96,361.5c-6.18,17.44-30.69,31.9-50.24,36.13-13.38,2.85-30.85,5.12-89.66-19.26-75.23-31.17-123.68-107.62-127.46-112.58-3.62-4.96-30.4-40.48-30.4-77.22s18.66-54.62,26.18-62.3c6.18-6.3,16.38-9.18,26.18-9.18,3.17,0,6.02,.16,8.58,.29,7.52,.32,11.3,.77,16.26,12.64,6.18,14.88,21.22,51.62,23.01,55.39,1.82,3.78,3.65,8.9,1.09,13.86-2.4,5.12-4.51,7.39-8.29,11.74s-7.36,7.68-11.14,12.35c-3.46,4.06-7.36,8.42-3.01,15.94,4.35,7.36,19.39,31.9,41.54,51.62,28.58,25.44,51.74,33.57,60.03,37.02,6.18,2.56,13.54,1.95,18.05-2.85,5.73-6.18,12.8-16.42,20-26.5,5.12-7.23,11.58-8.13,18.37-5.57,6.91,2.4,43.49,20.48,51.01,24.22,7.52,3.78,12.48,5.57,14.3,8.74,1.79,3.17,1.79,18.05-4.38,35.52Z"/></svg>
                        </a>
                    </div>
                </div>

                <div id="sobre-imovel">
                    <h5>Sobre: {{$imovel->titulo}}</h5>

                    {!! $imovel->descricao !!}

                    <p>
                        *Os valores do imóvel podem sofrer alteração sem aviso prévio.<br>
                        *Verifique a disponibilidade do imóvel.
                    </p>
                </div>

                <div id="diferenciais-imovel">
                    <ul>
                        @foreach($imovel->tags as $tag)
                            <li>
                                <p>
                                    <svg height="512pt" viewBox="0 -65 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m444.175781 0-260.871093 242.011719-110.324219-117.734375-72.980469 68.386718 178.234375 190.207032 333.765625-309.351563zm0 0"/></svg>
                                    {{$tag->nome}}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @if($imovel->googlemaps )
                    <div id="localizacao-mapa">
                        <h5>Localização</h5>
                        <div id="mapa">
                            {!!$imovel->googlemaps!!}
                        </div>
                    </div>
                @endif

            </div>

            <div id="right-imovel">
                <div id="right-imovel-int">
                    @include("template/formularioContato")
                </div>
            </div>

        </div>

    </div>


</div>

@include('template.bottom')
