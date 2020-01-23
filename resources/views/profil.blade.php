@extends('template')

@section('content')
<div class="container">
    <h2>Voici tous vos articles:</h2>
    <div class="row articlesUser">
        @foreach($user->articles as $article)
            <div class="jumbotron container mt-5 col-6">
                <div class="row">
                    <h3 class=" text-center display-4">{{$article->title}}</h3>
                </div>
                <div class="row">
                    <p class="col-6">{{$article->content}}</p>
                </div>

                <hr class="my-4">
                <div class="row">
                    <img height="350px"  width="350px" src="{{$article->picture}}"  alt="randomPicture">

                </div>
                <a href="{{route('updateOrCreate')}}/{{$article->id}}" class="btn btn-success mt-3">Modifier</a>
                <a href="{{route('delete')}}/{{$article['id']}}" class="btn btn-danger">Supprimer</a>
                <p>Créer par <strong>{{$user['name']}}</strong> </p>
            </div>
        @endforeach
    </div>
    <h2 class="mb-5">Voici tous vos commentaires:</h2>
    <div class=" row commentsUser">
        @foreach($user->writingsComments as $comment)
            <div class="mt-5 col-4 ">
                <h4>{{$comment['title']}}</h4>
                    <div class=""><p>{{$comment['content']}}</p></div>
                    <div class="">
                        <span>{{$comment['created_at']}}</span>
                        <p>{{ $comment->user->name }}</p>
                    </div>

                <hr>
            </div>
        @endforeach

    </div>
    @foreach($user->articleComment as $comment)
        {{dump($comment)}}
        <p>{{$comment}}</p>
    @endforeach

    <h2 class="mt-5">Modifie ton profile ici !!!!!!</h2>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" placeholder="Nom" name="name" value="{{$user->name}}">

            </div>
            <div class="col-4">
                <label for="email">Email:</label>
                <input type="text" class="form-control" placeholder="mail" name='email' value="{{$user->email}}">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4">
                <label for="avatar">Avatar:</label>
                <input type="file" class="form-control" placeholder="avatar" name='avatar' value="{{$user->email}}">
            </div>
            <div class="col-4">
                <img src="{{$user->avatar}}">
            </div>
        </div>
        <div class="row">
            <div class="col mt-5">
               <input type="submit" name="update" class='btn btn-success'>
            </div>
        </div>

    </form>
</div>
@endsection
