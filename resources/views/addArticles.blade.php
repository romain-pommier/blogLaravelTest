@extends('template')

@section('content')


    <div class="container mt-5">
        <h1 class='text-center'>Salut ajoute des articles juste ici poto !</h1>

        <form class="mt-4" method="POST">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-4">
                <label for="title">Titre:</label>
                    <input type="text" class="form-control" placeholder="Titre de l'article" name="title" value="{{$article->title}}">

                </div>
                <div class="col-4">
                <label for="picture">Image:</label>
                    <input type="text" class="form-control" placeholder=" url de l'image" name='picture' value="{{$article->picture}}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-3">
                    <textarea name="content" id="" cols="50" rows="10" placeholder='Indique le contenue de ton article' >{{$article->content}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mt-5">
                    @if($article->title )
                        <input type="submit" name="update" class='btn btn-success'>
                    @else
                        <input type="submit" name="create" class='btn btn-success'>
                    @endif

                </div>
            </div>
        </form>

    </div>
@endsection
