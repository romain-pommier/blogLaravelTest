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
Route::get('/articles', 'ArticlesController@show')->name('articles');
Route::get('/article/{title?}', 'ArticleController@showArticle')->name('article');
Route::get('/utilisateurs', 'UserController@showUser')->name('showUser');
Route::get('/tags', 'TagController@showTags')->name('showTags');

//create section
Route::get('/updateorcreatearticles','ArticleController@articleForm')->name('updateOrCreate')->middleware('connected');
Route::post('/updateorcreatearticles','ArticleController@createOrUpdate');

//update section
Route::get('/updateorcreatearticles/{id?}','ArticleController@articleForm',function () {})->name('updateOrCreate')->middleware('connected');
Route::post('/updateorcreatearticles/{id?}','ArticleController@createOrUpdate',function (){});

//delete section
Route::get('/delete/{id?}', 'ArticleController@delete', function (){})->name('delete')->middleware('auth');


//create commentaire
Route::post('/article/{title?}', 'CommentController@addComment')->name('createComment');

//profile
Route::get('/profile', 'ProfilController@showProfil', function (){})->name('profil');
Route::post('/profile', 'ProfilController@setProfil', function (){});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

