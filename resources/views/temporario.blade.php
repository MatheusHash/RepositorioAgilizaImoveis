<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://agilizaimoveis.com/imgs/logo_agiliza_imoveis.png"/>

    @include('template.metatags')


    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Agiliza Imóveis</title>
</head>

<style>
    #secao{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #000;
    }

    h1{
        font-size: 3rem;
    }
    h1 span{
        font-size: 5rem;

    }
    .logo-container{
        max-width: 400px;
        max-height: 350px;
    }

    .logo{
        max-width: 100%;
    }

</style>

<body>

    <section id="secao" class="vh-100">
        <div class="logo-container">
            <img  class="logo" src="/logo-agiliza.png" alt="Agiliza Imoveis" />
        </div>

        <div class="container d-flex justify-content-center">
            <div>
                <h1 style="color:#f95c02;">Apenas <span>3</span> dias para o novo site Agiliza !</h1>
            </div>
        </div>
    </section>

</body>
</html>
