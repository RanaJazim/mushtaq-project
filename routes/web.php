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

Route::get('/dashboard', function () {
    return view('panel.dashboard.dashboard');
});

Route::get('/gate', function () {
    return view('panel.gate.create');
});

// Routes for Gate
Route::resource('/gate', 'GatesController');

// Routes for Party
Route::resource('/party', 'Invoice\PartyController');

// Routes for Product
Route::resource('/product', 'Invoice\ProductController');

// Routes for Invoice
Route::get('/invoice/open', 'Invoice\InvoiceController@open')
    ->name('invoice.open');
Route::get('/invoice/create', 'Invoice\InvoiceController@create')
    ->name('invoice.create');
Route::post('/invoice', 'Invoice\InvoiceController@store')
    ->name('invoice.store');
Route::get('/invoice/{isTaxPayer}', 'Invoice\InvoiceController@index')
    ->name('invoice.index');
Route::get('/invoice/party/all/{id}', 'Invoice\InvoiceController@allParty');


// Roll store routes
Route::resource('/rollstore', 'Store\RollstoreController');

// Invoice routes
Route::get('/inward/create', 'Store\InwardController@create')
    ->name('inward.create');
Route::post('/inward', 'Store\InwardController@store')
    ->name('inward.store');
Route::get('/inward', 'Store\InwardController@index')
    ->name('inward.index');
Route::get('/inward/{inward}/edit', 'Store\InwardController@edit')
    ->name('inward.edit');
Route::delete('/inward/{inward}', 'Store\InwardController@destroy')
    ->name('inward.destroy');
Route::patch('/inward/{inward}', 'Store\InwardController@update')
    ->name('inward.update');


