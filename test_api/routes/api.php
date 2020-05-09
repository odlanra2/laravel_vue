<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/login', 'UserController@login');

Route::group(['prefix'=>'v1'], function(){
	Route::post('/login', 'UserController@login');

	//controlador categoria
	Route::post('/categoria/created', 'CategoriaController@created');

	Route::put('/categoria/update/{catgoria_id}', 'CategoriaController@update');

	Route::delete('/categoria/delete/{catgoria_id}', 'CategoriaController@delected');

	Route::put('/categoria/update/{catgoria_id}', 'CategoriaController@update');

	Route::get('/categoria/get', 'CategoriaController@get_all');

    Route::get('/categoria/getId/{catgoria_id}', 'CategoriaController@get_id');

    //controlador productos
    Route::post('/productos/created', 'ProductosController@created');

	Route::put('/productos/update/{producto_id}', 'ProductosController@update');

	Route::delete('/productos/delete/{producto_id}', 'ProductosController@delected');

	Route::put('/productos/update/{producto_id}', 'ProductosController@update');

	Route::get('/productos/get', 'ProductosController@get_all');

    Route::get('/productos/getId/{producto_id}', 'ProductosController@get_id');




});

