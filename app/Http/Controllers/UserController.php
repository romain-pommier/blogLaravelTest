<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function showUser(){
        $users = User::get();
        return view('users', ['users' => $users]);
    }
}
