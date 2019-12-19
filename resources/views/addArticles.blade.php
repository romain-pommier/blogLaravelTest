@extends('template')

@section('content')
    <div class="container mt-5">
        <h1 class='text-center'>Salut ajoute des articles juste ici poto !</h1>

        <form action="add" method="POST">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Titre de l'article" name="title">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" placeholder=" url de l'iimage" name='picture'>
                </div>
                <div class="col-6 mt-3">
                    <textarea name="content" id="" cols="30" rows="10" placeholder='Indique le contenue de ton article'></textarea>
                </div>
                <div class="col mt-5">
                    <input type="submit" class='btn btn-success'>
                </div>
            </div>
        </form>
        
    </div>
@endsection