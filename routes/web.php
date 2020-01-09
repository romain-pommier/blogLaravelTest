<?php



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
$role = ['auteur', 'admin'];

Route::get('/',function () {return view('welcome');});



//show section
Route::get('/articles', 'ArticlesController@show',function () {})->name('articles');
Route::get('/article/{title?}', 'ArticleController@showArticle',function () {})->name('article');


//update section
Route::get('/updateorcreatearticles/{id?}','ArticleController@articleForm',function () {})->name('updateOrCreate');
Route::post('/updateorcreatearticles/{id?}','ArticleController@createOrUpdate',function (){});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

