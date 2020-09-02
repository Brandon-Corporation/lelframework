@extends('lelframework::layouts\app')
@section('pageTitre', 'Tous les chapitres de '.$chaps[0]->name)
@section('content')
    <div class="container">

        <div class="container">
            <div class="row  mb--60">
                <div class="col-lg-5 mb--30">
                        <img src="{{Voyager::image($chaps[0]->image)}}" style="max-width: 100%;height: auto;display: block;" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 ">
                        <!--<p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>-->
                        <h1 class="product-title">{{$chaps[0]->name}}</h1>
                        <ul class="list-unstyled">
                            <li>Auteur(s): <span class="list-value">{{$chaps[0]->auteur}}</span></li>
                            <li>Artiste(s): {{$chaps[0]->artiste}}</li>
                            <li>genres: <span class="list-value"></span></li>
                        </ul>
                        <div class="price-block">
                        </div>
                        <div class="rating-widget">
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <!--<div class="review-widget">
                                <a href="">(1 Reviews)</a> <span>|</span>
                                <a href="">Write a review</a>
                            </div>-->
                        </div>
                        <article class="product-details-article">
                            <h4 class="sr-only">Description</h4>
                            <p>{{$chaps[0]->description}}</p>
                        </article>
                    </div>
                </div>
            </div>
            <div class="sb-custom-tab review-tab section-padding">
                <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                            Chapitres
                        </a>
                    </li>
                </ul>
                <div class="tab-content space-db--20" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                        <ul >
                            @foreach($chaps as $chap)
                                <li>
                                    <a href="/lel/{{$chap->name}}/ch{{$chap->numero}}">{{$chap->nom}}</a>
                                </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
