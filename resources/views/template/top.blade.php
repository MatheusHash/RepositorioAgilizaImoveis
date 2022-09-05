<!doctype html>
<html>
<head>

<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1" />
<meta name="format-detection" content="telephone=no">
{{-- <link rel="icon"  href="{{asset('logoAgiliza.ico')}}"/> --}}
<link rel="shortcut icon" href="{{asset('logoAgiliza.ico')}}" type="image/x-icon">
@include('template.metatags')

<title>Agiliza Imóveis</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/swiper.min.js')}}"></script>

</head>

<body>

<header id="top">
    <div class="container">

        <div id="bt-main-mobile" onClick="showMenu();">
            <svg id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 10"><path d="M14,6H1c-.55,0-1-.45-1-1s.45-1,1-1H14c.55,0,1,.45,1,1s-.45,1-1,1Zm0-4H1c-.55,0-1-.45-1-1S.45,0,1,0H14c.55,0,1,.45,1,1s-.45,1-1,1ZM1,8H14c.55,0,1,.45,1,1s-.45,1-1,1H1c-.55,0-1-.45-1-1s.45-1,1-1Z"/><path d="M14,6H1c-.55,0-1-.45-1-1s.45-1,1-1H14c.55,0,1,.45,1,1s-.45,1-1,1Zm0-4H1c-.55,0-1-.45-1-1S.45,0,1,0H14c.55,0,1,.45,1,1s-.45,1-1,1ZM1,8H14c.55,0,1,.45,1,1s-.45,1-1,1H1c-.55,0-1-.45-1-1s.45-1,1-1Z"/></svg>
        </div>

        <script>

            function showMenu(){
                $('#top').find('nav').toggleClass('show');
            }

            function movPage(page){

                if(window.innerWidth > 1024){
                    $('html, body').animate({scrollTop: $('#' + page).offset().top - 140}, 1000);
                }else{
                    $('html, body').animate({scrollTop: $('#' + page).offset().top - 60}, 1000);
                    $('#top').find('nav').removeClass('show');
                }

            }

        </script>

        <div id="logo">
            <a href="/">
                <img src="{{asset('imgs/logo_agiliza_imoveis.png')}}" alt="Agiliza imóveis ">
            </a>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('comprar')}}">Comprar</a>
                </li>
                <li>
                    <a href="{{route('alugar')}}">Alugar</a>
                </li>
                <li>
                    <a onClick="movPage('quem-somos');">Quem Somos</a>
                </li>
                <li>
                    <a href="{{route('lancamentos')}}">Lançamentos</a>
                </li>
                <li>
                    <a onClick="showForm();">Anunciar Imóvel</a>
                </li>
                <li>
                    <a onClick="showMenu();">Voltar</a>
                </li>
            </ul>
        </nav>

    </div>
</header>
