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
})->name('welcome');

Route::get('/items', [
    'uses' => 'ItemController@getItems',
    'as' => 'items'
]);

Route::post('/addItem', [
   'uses' => 'ItemController@addItem',
   'as' => 'addItem'
]);

Route::post('/editItem', [
   'uses' => 'ItemController@editItem',
   'as' => 'editItem'
]);

Route::get('/deleteItem/{item_id}', [
   'uses' => 'ItemController@deleteItem',
   'as' => 'deleteItem'
]);

Route::get('/customers', [
    'uses' => 'CustomerController@getCustomers',
    'as' => 'customers'
]);

Route::post('/addCustomer', [
   'uses' => 'CustomerController@addCustomer',
   'as' => 'addCustomer'
]);

Route::post('/editCustomer', [
   'uses' => 'CustomerController@editCustomer',
   'as' => 'editCustomer'
]);

Route::get('/deleteCustomer/{customer_id}', [
   'uses' => 'CustomerController@deleteCustomer',
   'as' => 'deleteCustomer'
]);

Route::get('/saleNotes', [
    'uses' => 'SaleController@getSaleNotes',
    'as' => 'saleNotes'
]);

Route::post('/addSaleNote', [
    'uses' => 'SaleController@addSaleNote',
    'as' => 'addSaleNote'
]);

Route::get('/deleteSaleNote/{sale_note_id}', [
   'uses' => 'SaleController@deleteSaleNote',
   'as' => 'deleteSaleNote'
]);

Route::get('/addSaleGet/{sale_note_id}', [
   'uses' => 'SaleController@addSaleGet',
   'as' => 'addSaleGet'
]);

Route::post('/addSalePost', [
   'uses' => 'SaleController@addSalePost',
   'as' => 'addSalePost'
]);

Route::post('/editSale', [
   'uses' => 'SaleController@editSale',
   'as' => 'editSale'
]);

Route::get('/deleteSale/{item_id}', [
   'uses' => 'SaleController@deleteSale',
   'as' => 'deleteSale'
]);

Route::get('/printSale/{sale_note_id}', [
   'uses' => 'SaleController@printSale',
   'as' => 'printSale'
]);
