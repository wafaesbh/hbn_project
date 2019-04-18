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


Auth::routes();

//====================Facturation=====================================================
Route::get('/', function () {
    return view('liste');
});
Route::get('/gestion_utilisateur', function () {
    return view('gestion_utilisateur');
});
Route::post('store','FacturationController@store')->name('store');
Route::get('facturation','FacturationController@create')->name('facture');
Route::get('taxables','TaxableController@liste')->name('taxable');

Route::get('liste',function() {
    return view("liste");
})->name('liste');
Route::get('/modifierFacture/{id}', function () {
    return view('modifierFacture');
});
Route::get('detail/{code}',function($code) {
    return view("detail", compact("code"));
})->name('detail');




Route::post('storeTaxable','FacturationController@storeTaxable')->name('storeTaxable');
Route::post('updateTaxable/{code}','FacturationController@updateTaxable')->name('updateTaxable');
Route::get('destroyTaxable/{id}','FacturationController@destroyTaxable')->name('destroyTaxable');





//==================== Debour=====================================================
Route::post('storeDebour','DebourController@storeDebour')->name('storeDebour');
Route::post('updateDebour/{code}','DebourController@updateDebour')->name('updateDebour');
Route::get('destroyDebour/{id}','DebourController@destroyDebour')->name('destroyDebour');
//==================== Client=====================================================
Route::get('ajouterClient',function() {
    return view("ajouterClient");
})->name('ajouterClient');
Route::get('listeClient',function() {
    return view("listeClient");
})->name('listeClient');
Route::get('/modifierClient/{id}', function ($id) {
    return view("modifierClient", compact("id"));
})->name('modifierClient');
Route::get('editClient/{id}','ClientController@editClient');
Route::post('updateClient/{id}','ClientController@updateClient')->name('updateClient');
Route::post('storeClient','ClientController@storeClient');
// Route::get('destroyClient/{id}','ClientController@destroyClient')->name('destroyClient');