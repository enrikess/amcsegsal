<?php

use App\model\Tipo;
use App\model\Elemento;
use App\Model\Pregunta;
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
    Route::get('/index', 'SeguridadSaludController@index')->name('index');
    Route::get('/create', 'SeguridadSaludController@create')->name('create');
    Route::post('/store', 'SeguridadSaludController@store')->name('store');
    Route::get('/{id}/edit', 'SeguridadSaludController@edit')->name('edit');
    Route::put('/{id}', 'SeguridadSaludController@update')->name('update');
    Route::delete('/{id}', 'SeguridadSaludController@destroy')->name('destroy');
    Route::get('/{id}', 'SeguridadSaludController@show')->name('show');
    Route::post('/grafico/{id}', 'SeguridadSaludController@grafico')->name('grafico');
    Route::any('/pdf/{id}', 'SeguridadSaludController@pdf')->name('pdf');



    Route::post('/elemento/listar', 'ElementoController@listar')->name('elemento.listar');
    Route::post('/lineamiento/listar', 'LineamientoController@listar')->name('lineamiento.listar');
    Route::post('/estimacion/listar', 'EstimacionController@listar')->name('estimacion.listar');
});
