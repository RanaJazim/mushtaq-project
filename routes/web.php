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

// Routes for Day book
Route::get('/daybook/create', 'DaybookController@create')->name('daybook.create');
Route::post('/daybook', 'DaybookController@store')->name('daybook.store');
Route::get('/daybook', 'DaybookController@index')->name('daybook.index');
Route::patch('/daybook/{daybook}', 'DaybookController@update')->name('daybook.update');

// Routes for Expenses
Route::get('/expenses/create', 'ExpensesController@create')
    ->name('expenses.create');
Route::get('/expenses', 'ExpensesController@selectDate')
    ->name('expenses.select');


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
Route::get('/invoice/party/{party}/all/status/{isTaxPayer}',
    'Invoice\InvoiceController@allParty')
    ->name('invoice.all');
Route::get('/invoice/{invoice}/status/{isTaxPayer}/print',
    'Invoice\InvoiceController@print')
    ->name('invoice.print');
Route::get('/invoice/{invoice}/status/{isTaxPayer}/dc/print',
    'Invoice\InvoiceController@dcPrint')
    ->name('invoice.dcPrint');


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

// Routes for Raw Material
//Route::resource('/inward/{inwardId}/rawmaterial', 'Store\RawMaterialStoreController');

// Routes for Select Machine ( -- Raw Material Store -- )
Route::get('/inward/{inward}/select/machine', 'Store\SelectMachineController@create')
    ->name('machine.select');
Route::post('/add/machine', 'Store\SelectMachineController@store')
    ->name('machine.store');
Route::get('/inward/{inward}/machines', 'Store\SelectMachineController@index')
    ->name('machine.index');


// Routes for Plant Sheet Module
Route::get('/inward/{inward}/raw/{raw}/plantsheet/create', 'Store\PlantSheetController@create')
    ->name('plantsheet.create');
Route::post('/plantsheet', 'Store\PlantSheetController@store')
    ->name('plantsheet.store');


// Routes for Print the Report of Plantsheet
Route::get('inward/{inward}/printreport/create', 'Store\PrintReportController@create')
    ->name('psReport.create');
Route::post('/inward/{inward}/printreport', 'Store\PrintReportController@store')
    ->name('psReport.store');


// Routes for PO Module
Route::get('/po/select/party', 'Po\PoController@open')
    ->name('po.open');
Route::get('/party/{party}/po/create', 'Po\PoController@create')
    ->name('po.create');
Route::post('/po', 'Po\PoController@store')
    ->name('po.store');
Route::get('/party/{party}/po', 'Po\PoController@index')
    ->name('po.index');
Route::delete('/po/{po}', 'Po\PoController@destroy')
    ->name('po.destroy');

// Routes for Poinfo module
Route::get('/po/{po}/poinfo/create', 'Po\PoInfoController@create')
    ->name('poinfo.create');
Route::post('/poinfo', 'Po\PoInfoController@store')
    ->name('poinfo.store');
Route::get('/po/{po}/poinfo', 'Po\PoInfoController@index')
    ->name('poinfo.index');


// Routes for Final Finish Store
Route::get('/final-finish-store/create', 'Store\FinishStoreController@create')
    ->name('finishstore.create');
Route::post('/final-finish-store', 'Store\FinishStoreController@store')
    ->name('finishstore.store');
Route::get('/final-finish-store', 'Store\FinishStoreController@index')
    ->name('finishstore.index');
Route::get('/final-finish-store/edit/{id}', 'Store\FinishStoreController@edit')
    ->name('finishstore.edit');
Route::patch('/final-finish-store/{id}', 'Store\FinishStoreController@update')
    ->name('finishstore.update');
Route::delete('/final-finish-store/{id}', 'Store\FinishStoreController@destroy')
    ->name('finishstore.destroy');

// Authentication
Route::get('/login', function () {
    return view('authentication.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
