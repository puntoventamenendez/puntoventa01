<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Rutas generales
Route::get('/', function () {    return view('login'); });

Route::get('/api/configuracion',function(){ return view('configuracion'); });

//Ventas
Route::get('/venta', 'VentasController@index');

//UNIDADES
Route::get('/api/configuracion/unidades',function(){ return view('unidad') ;});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/unidad/{id?}',['as' => 'unidadindex','uses' => 'UnidadesController@index']);
	Route::post('/configuracion/unidad','UnidadesController@store');
	Route::post('/configuracion/unidad/{id}',['as'=>'unidadupdate','uses'=> 'UnidadesController@update']);
	Route::delete('/configuracion/unidad/{id}','UnidadesController@destroy');
});

//MARCAS
Route::get('/api/configuracion/marcas',function(){ return view('marca');});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/marca/{id?}',['as' => 'marcaindex','uses' => 'MarcasController@index']);
	Route::post('/configuracion/marca','MarcasController@store');
	Route::post('/configuracion/marca/{id}',['as'=>'marcaupdate','uses'=> 'MarcasController@update']);
	Route::delete('/configuracion/marca/{id}','MarcasController@destroy');
});

//BODEGA
Route::get('/api/configuracion/bodegas',function(){ return view('bodega');});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/bodega/{id?}',['as' => 'bodegaindex','uses' => 'BodegasController@index']);
	Route::post('/configuracion/bodega','BodegasController@store');
	Route::post('/configuracion/bodega/{id}',['as'=>'bodegaupdate','uses'=> 'BodegasController@update']);
	Route::delete('/configuracion/bodega/{id}','BodegasController@destroy');
});

//CAJA
Route::get('/api/configuracion/cajas',function(){ return view('caja');});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/caja/{id?}',['as' => 'cajaindex','uses' => 'CajasController@index']);
	Route::post('/configuracion/caja','CajasController@store');
	Route::post('/configuracion/caja/{id}',['as'=>'cajaupdate','uses'=> 'CajasController@update']);
	Route::delete('/configuracion/caja/{id}','CajasController@destroy');
});

//CATEGORIAS
Route::get('/api/configuracion/categorias',function(){ return view('categoria');});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/categoria/{id?}',['as' => 'categoriaindex','uses' => 'CategoriasController@index']);
	Route::post('/configuracion/categoria','CategoriasController@store');
	Route::post('/configuracion/categoria/{id}',['as'=>'categoriaupdate','uses'=> 'CategoriasController@update']);
	Route::delete('/configuracion/categoria/{id}','CategoriasController@destroy');
});

//SUBCATEGORIAS
Route::get('/api/configuracion/subcategorias',function(){ return view('subCategoria');});
Route::group(array('prefix' => 'api'), function() {   
	Route::get('/configuracion/subcategoria/{id?}',['as' => 'subcategoriaindex','uses' => 'SubCategoriasController@index']);
	Route::post('/configuracion/subcategoria','SubCategoriasController@store');
	Route::post('/configuracion/subcategoria/{id}',['as'=>'subcategoriaupdate','uses'=> 'SubCategoriasController@update']);
	Route::delete('/configuracion/subcategoria/{id}','SubCategoriasController@destroy');
});

//Unidades
//Route::get('/configuracion/unidad',function(){	return view('unidad');});

//Auth::routes();
