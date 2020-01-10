<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfil(){
        $user = User::find(auth()->id());

        dump($user->articleComment);


        return view('profil',['user' => $user]);

    }
}
