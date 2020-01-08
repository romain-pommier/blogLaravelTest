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


Route::get('/',function () {return view('welcome');});



//show section
Route::get('/articles', 'ArticlesController@show',function () {});
Route::get('/article/{title}', 'ArticleController@showArticle',function () {});


//update section
Route::get('/updateorcreatearticles/{id?}','ArticleController@articleForm',function () {});
Route::post('/updateorcreatearticles/{id?}','ArticleController@createOrUpdate',function () {});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

