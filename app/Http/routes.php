<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/', 'ListController@show');
Route::group(['prefix' => 'todo-mvc'], function () {
    Route::get('/', 'ListController@show');
    Route::post('/add', 'ListController@add');
	Route::post('/edit/{id}', 'ListController@edit');
	Route::get('/delete/{id}', 'ListController@delete');

	Route::get('/todo-item/{todo_list_id}', 'ListItemController@show');
	Route::post('/todo-item/add', 'ListItemController@add');
	Route::post('/todo-item/edit/{id}', 'ListItemController@edit');
	Route::get('/todo-item/delete/{id}', 'ListItemController@delete');

	Route::auth();
	

});

Route::get('/home', 'HomeController@index');
