<?php

use App\model\Tipo;
use App\model\Elemento;
use App\Model\Pregunta;
use Illuminate\Support\Facades\Auth;
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


Route::group(['prefix'=>'segsal','as'=>'segsal.'],function () {
    Route::get('/index', 'SeguridadSaludController@index')->name('index')->middleware('auth');;
    Route::get('/create', 'SeguridadSaludController@create')->name('create')->middleware('auth');;
    Route::post('/store', 'SeguridadSaludController@store')->name('store')->middleware('auth');;
    Route::get('/{id}/edit', 'SeguridadSaludController@edit')->name('edit')->middleware('auth');;
    Route::put('/{id}', 'SeguridadSaludController@update')->name('update')->middleware('auth');;
    Route::delete('/{id}', 'SeguridadSaludController@destroy')->name('destroy')->middleware('auth');;
    Route::get('/{id}', 'SeguridadSaludController@show')->name('show')->middleware('auth');;
    Route::post('/grafico/{id}', 'SeguridadSaludController@grafico')->name('grafico')->middleware('auth');;
    Route::any('/pdf/{id}', 'SeguridadSaludController@pdf')->name('pdf');



    Route::post('/elemento/listar', 'ElementoController@listar')->name('elemento.listar');
    Route::post('/lineamiento/listar', 'LineamientoController@listar')->name('lineamiento.listar');
    Route::post('/estimacion/listar', 'EstimacionController@listar')->name('estimacion.listar');
});

Auth::routes(['register' => false]);
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
