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

        $token = Auth::user()->api_token;
        $request = new Request();

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'http://www.bloglaraveltest.com/apitest/articles', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'api_token' => $token,
            ],
        ]);
//        dd(json_decode($response->getBody()));
//        return view('articles',['articles' => $articles,'user' => auth()->check()]);
        return view('articles',['articles' => json_decode($response->getBody()),'user' => auth()->check()]);
    }




}
