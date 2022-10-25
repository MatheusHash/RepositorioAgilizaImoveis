
<html lang="pt-br">
    <head>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/admin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <title>Agiliza Imóveis</title>

    </head>
    <body>
        @include('layouts.navigation')
        <section class="container">
            @yield('content')
        </section>


        {{-- <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script> --}}
        {{-- <script type="text/javascript" src="{{asset('js/swiper.min.js')}}"></script> --}}
    </body>
</html>
