<?php

use Faker\Factory;
use Faker\Provider\DateTime;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {
  return view('welcome');
});
Route::get('/articles',function () {
    $faker = Faker\Factory::create();
    $dataArticles = [];
    $article = [];
    for($i = 0; $i <= 20; $i++){
        $article['picture'] = $faker->imageUrl($width = 640, $height = 480);
        $article['content'] = $faker->text($maxNbChars = 200);
        $article['word'] = $faker->word;
        array_push($dataArticles,$article);
    }
    return view('articles',['dataArticles' => $dataArticles]);
});

Route::get('/addarticles',function () {

    return view('addArticles');
});
Route::post('/addarticles',function () {

    return dd(request());
});

