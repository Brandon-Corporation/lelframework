@extends('lelframework::layouts\app')
@section('pageTitre', '')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Projets {{$etat}}</h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($resultats as $resultat)
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="{{Voyager::image($resultat->image)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/lel/{{$resultat->name}}/">{{$resultat->name}}</a></h5>
                                <p class="card-text">{{$resultat->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
