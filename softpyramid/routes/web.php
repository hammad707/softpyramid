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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'questionair'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'QuestionairController@index']);
	Route::get('/create', ['as' => 'create', 'uses' => 'QuestionairController@create']);
	Route::post('/save_questionair', ['as' => 'save_questionair', 'uses' => 'QuestionairController@save']);
	Route::get('/destroy/{id}','QuestionairController@destroy');
	Route::get('/edit/{id}','QuestionairController@edit');
	Route::post('/update_questionair/{id}', 'QuestionairController@update');
});
