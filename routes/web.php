<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.index');
});

Route::resource('clientes', "Admin\ClienteController");

Route::resource('propostas', "Admin\PropostaController");

Route::post('proposta/atualiza/status',"Admin\PropostaController@updateStatus");

Route::get('propostas/export/', 'Admin\PropostaController@export')->name('export');

Route::post('propostas/pesquisa/', 'Admin\PropostaController@pesquisa')->name('pesquisa');

Route::resource('users', "Admin\UserController");
