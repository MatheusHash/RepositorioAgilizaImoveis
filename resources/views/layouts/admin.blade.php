
<html lang="pt-br">
    <head>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <title>Agiliza Imóveis</title>

    </head>
    <body>
        @include('layouts.navigation')
        <section class="container">
            @yield('content')
        </section>
    </body>
</html>
