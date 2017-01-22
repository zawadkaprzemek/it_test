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
//Route::auth();
/*
Route::get('/domains','DomainsController@index');
Route::post('/domains','DomainsController@store');
Route::get('/domains/create','DomainsController@create');
Route::delete('/domains/{domains}',array('uses'=>'DomainsController@destroy','as'=>'domain_destroy'));
Route::put('/domains/{domains}','DomainsController@update');
Route::get('/domains/{domains}','DomainsController@show');
Route::get('/domains/{domains}/edit','DomainsController@edit');

Route::get('/products','ProductsController@index');
Route::post('/products','ProductsController@store');
Route::get('/products/create','ProductsController@create');
Route::delete('/products/{domains}',array('uses'=>'ProductsController@destroy','as'=>'product_destroy'));
Route::put('/products/{products}','ProductsController@update');
Route::get('/products/{products}','ProductsController@show');
Route::get('/products/{products}/edit','ProductsController@edit');*/
