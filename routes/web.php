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

########## CATEGORIAS ##########
Route::get('/adminCategorias', 'CategoriasController@index');
Route::get('/formAgregarCategorias', 'CategoriasController@create');
Route::post('/agregarCategoria', 'CategoriasController@store');
Route::get('/formModificarCategorias/{id}', 'CategoriasController@edit');
Route::post('/modificarCategoria/{id}', 'CategoriasController@update');
Route::post('/eliminarCategoria', 'CategoriasController@destroy');

########## MARCAS ##########
Route::get('/adminMarcas', 'MarcasController@index');
Route::get('/formAgregarMarcas', 'MarcasController@create');
Route::post('/agregarMarca', 'MarcasController@store');
Route::get('/formModificarMarcas/{id}', 'MarcasController@edit');
Route::post('/modificarMarca/{id}', 'MarcasController@update');
Route::post('/eliminarMarca', 'MarcasController@destroy');

########## PRODUCTOS ##########
Route::get('/adminProductos', 'ProductosController@index');
Route::get('/formAgregarProductos', 'ProductosController@create');
Route::post('/agregarProducto', 'ProductosController@store');
Route::get('/formModificarProductos/{id}', 'ProductosController@edit');
Route::post('/modificarProducto/{id}', 'ProductosController@update');
Route::post('/eliminarProducto', 'ProductosController@destroy');

######## VISTA COMUN ###########

Route::get('/', function () {
    return view('/index');
});

Route::get('faq', function () {
    return view('faq');
});

Route::get('contacto', function () {
    return view('/contacto');
});

Route::get('/productos', 'ProductosController@listadoProductos');

Route::get('/detalleProducto/{id}', 'ProductosController@show');

Route::get('productos/{filtro}','ProductosController@filtros');

Route::get('perfil', function (){
    return view('perfilUsuario');
});

######## AUTH ###########
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
