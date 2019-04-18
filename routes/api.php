<?php

use Illuminate\Http\Request;

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
// Facuration=========================================================================
Route::get('/factures', 'FacturationController@index');
Route::get('/facturer/{code}', 'FacturationController@facturer');
Route::get('/detail/{code}','FacturationController@show');
Route::get('/detailTaxable/{code}','FacturationController@showTaxable');
Route::get('/detailDebour/{code}','FacturationController@showDebour');
Route::get('/detailFacture/{code}','FacturationController@showFacture');

Route::get('/debours', 'DebourController@index');
Route::post('update/{id}','FacturationController@update')->name('update');
Route::post('/store','FacturationController@store');
Route::get('/edit/{id}','FacturationController@edit');
Route::get('/show/{id}','FacturationController@show')->name('show');
Route::get('/destroy/{id}','FacturationController@destroy')->name('delete');
// Taxable=========================================================================
Route::get('/taxables/{code}', 'TaxableController@show');
// Route::post('/storeTaxable','FacturationController@storeTaxable')->name('storeTaxable');
// Route::post('updateTaxable/{code}','FacturationController@updateTaxable')->name('updateTaxable');
Route::get('/editTaxabel/{code}','TaxableController@editTaxable')->name('editTaxable');
// Route::get('/destroyTaxable/{id}','FacturationController@destroyTaxable')->name('destroyTaxable');
// CLient===============================================================================
Route::get('/clients', 'ClientController@index');
// Route::get('editClient/{id}','ClientController@editClient')->name('editClient');
// Route::post('/updateClient/{id}','ClientController@updateClient')->name('updateClient');

