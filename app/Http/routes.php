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
//Rota de autorização de apis client e DeliveryMan
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
//Rotas da Api Client e DeliveryMan
Route::group(['prefix'=>'api','middleware'=>'oauth', 'as'=>'api.'], function(){
	Route::group(['prefix'=>'client','middleware'=>'oauth.check:client', 'as'=>'client.'], function(){
		
		Route::resource('order', 'Api\Client\ClientCheckoutController',['except'=>['edit', 'destroy', 'create']]);
	
	});
	Route::group(['prefix'=>'deliveryman','middleware'=>'oauth.check:deliveryman','as'=>'deliveryman.'], function(){
		
		Route::resource('order', 'Api\Deliveryman\DeliverymanCheckoutController',['except'=>['edit', 'destroy', 'create', 'store']]);
		Route::patch('order/{id}/update-status', 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus');
	
	
	});
	
});

//Rota para area do cliente
Route::group(['prefix'=>'customer','middleware'=>'auth.check:client', 'as'=>'customer.'], function(){

	Route::get('order', ['as'=>'order', 'uses'=>'CheckoutController@index']);
	Route::get('order/create', ['as'=>'order.create', 'uses'=>'CheckoutController@create']);
	Route::post('order/store', ['as'=>'order.store', 'uses'=>'CheckoutController@store']);



});
//Rota para area administrativa
Route::group(["prefix"=>'admin','middleware'=>'auth.check:admin', 'as'=>'admin.'],function(){
    
Route::get('categories', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
Route::get('categories', ['as'=>'categories.index', 'uses'=>'CategoriesController@index']);
Route::get('categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
Route::post('categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@store']);
Route::get('categories/edit/{id}', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
Route::post('categories/update/{id}', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
Route::get('categories/delete/{id}', ['as'=>'categories.delete', 'uses'=>'CategoriesController@destroy']);

Route::get('clients', ['as'=>'clients', 'uses'=>'ClientsController@index']);
Route::get('clients', ['as'=>'clients.index', 'uses'=>'ClientsController@index']);
Route::get('clients/create', ['as'=>'clients.create', 'uses'=>'ClientsController@create']);
Route::post('clients/create', ['as'=>'clients.create', 'uses'=>'ClientsController@store']);
Route::get('clients/edit/{id}', ['as'=>'clients.edit', 'uses'=>'ClientsController@edit']);
Route::post('clients/update/{id}', ['as'=>'clients.update', 'uses'=>'ClientsController@update']);
Route::get('clients/delete/{id}', ['as'=>'clients.delete', 'uses'=>'ClientsController@destroy']);


Route::get('products', ['as'=>'products', 'uses'=>'ProductsController@index']);
Route::get('products', ['as'=>'products.index', 'uses'=>'ProductsController@index']);
Route::get('products/create', ['as'=>'products.create', 'uses'=>'ProductsController@create']);
Route::post('products/create', ['as'=>'products.create', 'uses'=>'ProductsController@store']);
Route::get('products/edit/{id}', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
Route::post('products/update/{id}', ['as'=>'products.update', 'uses'=>'ProductsController@update']);
Route::get('products/delete/{id}', ['as'=>'products.delete', 'uses'=>'ProductsController@destroy']);
    
    
Route::get('orders', ['as'=>'orders', 'uses'=>'OrdersController@index']);
Route::get('orders', ['as'=>'orders.index', 'uses'=>'OrdersController@index']);
Route::get('orders/edit/{id}', ['as'=>'orders.edit', 'uses'=>'OrdersController@edit']);
Route::post('orders/update/{id}', ['as'=>'orders.update', 'uses'=>'OrdersController@update']);

Route::get('cupoms', ['as'=>'cupoms.index', 'uses'=>'CupomsController@index']);
Route::get('cupoms/create', ['as'=>'cupoms.create', 'uses'=>'CupomsController@create']);
Route::post('cupoms/create', ['as'=>'cupoms.create', 'uses'=>'CupomsController@store']);
//Route::get('cupoms/edit/{id}', ['as'=>'cupoms.edit', 'uses'=>'CupomsController@edit']);
Route::post('cupoms/store/{id}', ['as'=>'cupoms.update', 'uses'=>'CupomsController@update']);
    
});
