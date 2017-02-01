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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('domains','DomainsController');
Route::resource('products','ProductsController');
Route::resource('pages','PagesController');
Route::auth();
Route::group(['prefix' => 'api/it', 'middleware' => 'auth:api'], function () {

    Route::get('product/list', ['as' => 'get:product/list', 'uses' => 'ApiProductController@lists']);
    Route::get('product/{id}', ['as' => 'get:product', 'uses' => 'ApiProductController@show']);

    Route::get('domain/list', ['as' => 'get:domain/list', 'uses' => 'ApiDomainController@lists']);
    Route::get('domain/{id}', ['as' => 'get:domain', 'uses' => 'ApiDomainController@show']);

    Route::get('page/list', ['as' => 'get:page/list', 'uses' => 'ApiPageController@lists']);
    Route::get('page/{id}', ['as' => 'get:page', 'uses' => 'ApiPageController@show']);

});

Route::get('/home', 'HomeController@index');
