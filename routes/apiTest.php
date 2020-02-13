<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/test','DefaultController@test')->name('test');

Route::middleware('auth:api')->post('/articles','ArticlesController@show')->name('show');
