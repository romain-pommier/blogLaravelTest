<?php

namespace App\Http\Controllers\ApiTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
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
        return new JsonResponse($articles);
//        return view('articles',['articles' => $articles,'user' => auth()->check()]);
    }



}
