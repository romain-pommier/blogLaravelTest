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
        <a href="{{route('delete')}}/{{$article['id']}}" class="btn btn-danger">Supprimer</a>
        <p>Créer par <strong>{{$user['name']}}</strong> </p>
    </div>
    <div class="container">
        <div class="showComments">
            @foreach($comments as $comment)
                <div>
                    <h4>{{$comment['title']}}</h4>
                    <div class="row">
                        <div class="col-md-6"><p>{{$comment['content']}}</p></div>
                        <div class="col-md-6">
                            <span>{{$comment['created_at']}}</span>
                            <p>{{ $comment->user->name }}</p>
                        </div>
                    </div>

                    <hr>

                </div>
            @endforeach
        </div>
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-4">
                    <label for="title">Titre:</label>
                    <input type="text" class="form-control" placeholder="Titre du commentaire" name="title" >
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-3">
                    <label for="content">Commentaire:</label>
                    <textarea name="content" id="" cols="50" rows="10" placeholder='Indique le contenue du commentaire'></textarea>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="id" value="{{$article['id']}}">
                <div class="col-6 mt-5">
                    <input type="submit" name="create" class='btn btn-success'>
                </div>

            </div>

        </form>
    </div>
@endsection;
