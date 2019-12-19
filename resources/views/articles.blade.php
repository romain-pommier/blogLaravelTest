@extends('template')

@section('content')
    <div class="container mt-5">
    <a class="btn btn-primary" href='addarticles'>Viens ajouter des articles !!!</a>
        <h1 class='text-center'>Voici les articles disponibles</h1>
        <div class='row'>
             @foreach ($dataArticles as $article)
                <div class="card col-4" style="width: 18rem;">
                    <img src="{{$article['picture']}}" class="card-img-top" alt="randomPicture">
                    <div class="card-body">
                        <h5 class="card-title">{{$article['word']}}</h5>
                        <p class="card-text">{{$article['content']}}</p>
                        <a href="#" class="btn btn-primary">En savoir plus </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection