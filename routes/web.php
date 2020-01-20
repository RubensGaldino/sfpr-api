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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('contas', 'ContaController');
    Route::resource('receitas', 'ReceitaController');
    Route::resource('despesas', 'DespesaController');
});

Route::get('/home', 'HomeController@index')->name('home');