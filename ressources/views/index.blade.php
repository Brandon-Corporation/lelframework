<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src=""></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-55713183-3');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brandon Corp - scantrad</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
{!! menu('site', 'lelframework::layouts\menu') !!}
<main class="py-4">
    <div class="container">
        <div class="col-xs-6">
            <div class="title m-b-md">
                {{setting('site.nomTeam')}}
            </div>

        </div>
    <div class="row">
        <div class="col-md-auto">
            <h2>Dernières sorties</h2>
        </div>
    </div>
        <div class="row">

            @foreach($mangas as $manga)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="{{Voyager::image($manga[0]->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title"><a href="/lel/{{$manga[0]->name}}/">{{$manga[0]->name}}</a></h3>
                            <p class="card-text">
                                @foreach($manga as $mang)
                                    <a href="/lel/{{$mang->name}}/ch{{$mang->numero}}">{{$mang->nom}}</a><br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</main>
<footer class="page-footer font-small">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase">La team</h5>
                <p><br>N'hésitez pas à la soutenir sur <a href="{{setting('site.discord')}}" target="_blank">Discord</a> </p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">Partenaire</h5>
            </div>

        </div>
    </div>
    <div class="footer-copyright text-center py-3"> © 2020 Copyright:
        <a href="{{URL::to('/')}}">{{setting('site.nomTeam')}}</a>
    </div>
</footer>
</body>
</html>
