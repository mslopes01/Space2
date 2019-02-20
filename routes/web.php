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
// Chamada para pagina inicial
Route::get('/', function () {
    return view('welcome');
});
// Chamada da function Saltos
Route::post('pesquisa','StarshipsController@saltos');
