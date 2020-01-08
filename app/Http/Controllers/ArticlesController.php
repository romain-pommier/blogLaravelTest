<?php

namespace App\Http\Controllers;

use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Article;

class articlesController extends Controller
{

    //    -----------------------------SHOW-------------------------
    //---------------------------------------------------------------
    public function show()
    {
        $articles = Article::get();

        return view('articles',['articles' => $articles,'user' => auth()->check()]);
    }



}
