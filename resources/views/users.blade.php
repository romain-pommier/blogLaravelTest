@extends('template')

@section('content')
    <div class="container">
        <div class="row">

    @foreach($users as $user)

        <div class="jumbotron container col-md-6 mt-5 ">
            <h3 class=" text-center display-4">{{$user->name}}</h3>
            <p class="col-6">{{$user->email}}</p>
            <hr class="my-4">
            <div class="row d-flex" >
                <img height="300px" class="col-6 justify-content-center" width="250px" style=" margin-right: 50%;
    transform: translateX(50%);" src="{{$user->avatar}}"  alt="randomPicture">

            </div>

        </div>
    @endforeach
        </div>
    </div>
@endsection
