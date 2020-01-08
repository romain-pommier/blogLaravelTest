@extends('template')

@section('content')
    <div class="container mt-5">
        @if($user)
            <a class="btn btn-primary" href='updateorcreatearticles'>Viens ajouter des articles !!!</a>
        @endif

        <h1 class='text-center'>Voici les articles disponibles</h1>
        <div class='row'>
             @foreach ($articles as $article)
                <div class="card col-4" style="width: 18rem;">
                    <img src="{{$article['picture']}}" class="card-img-top" alt="randomPicture">
                    <div class="card-body">
                        <h5 class="card-title">{{$article['title']}}</h5>
                        <p class="card-text">{{$article['content']}}</p>
                        <a href="/articles/{{$article['title']}}" class="btn btn-primary">En savoir plus </a>
                        <a href="updateorcreatearticles/{{$article['id']}}" class="btn btn-success">Modifier</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
