@extends('template')

@section('content')

    <div class="jumbotron container mt-5">
        <h3 class=" text-center display-4">{{$article->title}}</h3>
        <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam debitis ex quisquam obcaecati deleniti, quis corrupti libero ullam quibusdam! Blanditiis voluptates ea obcaecati commodi saepe neque quasi vel nulla dolore.</p>
        <hr class="my-4">
        <div class="row">
        <img height="350px" class="col-6" width="250px" src="{{$article->picture}}"  alt="randomPicture">
        <p class="col-6">{{$article->content}}</p>
        </div>
        <a href="{{route('updateOrCreate')}}/{{$article->id}}" class="btn btn-success mt-3">Modifier</a>
        <p>Créer par <strong>{{$user->name}}</strong> </p>
    </div>
@endsection;
