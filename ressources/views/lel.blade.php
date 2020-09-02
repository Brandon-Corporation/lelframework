@extends('lelframework::layouts\app')
@section('pageTitre', $chap[0]->name.' - '.$chap[0]->nom)
@section('content')
    <div class="container">
        <div class="row justify-content-center"><h1>{{$chap[0]->name}}</h1></div>
        <div class="row justify-content-center"><h2>{{$chap[0]->nom}}</h2></div>
            <div class="row justify-content-center">
                {{ $info ?? '' }}
                @foreach($files as $file)
                    <img src="http://brandoncorpscan.local/{{$file}}" class="img-fluid" /><br />
                @endforeach

            </div>
        <div class="row">
            <div class="col align-self-start">
                <?php if(!$navigation['chapAvant']->isEmpty()) { ?><a href="/lel/{{$chap[0]->name}}/ch{{$navigation['chapAvant'][0]->numero}}">chapitre précédent</a><?php } ?>
            </div>
            <div class="col align-self-end">
                <?php if(!$navigation['chapApres']->isEmpty()) { ?><a href="/lel/{{$chap[0]->name}}/ch{{$navigation['chapApres'][0]->numero}}">chapitre suivant</a><?php } ?>
            </div>
        </div>
    </div>
@endsection
