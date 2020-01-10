<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfil(){
        $user = User::find(auth()->id());

        $allArticles = $user->articles;

        $allComments = $user->comments;


//        dd($user, $user->comments);

        return view('profil',['user' => $user]);

    }
}
