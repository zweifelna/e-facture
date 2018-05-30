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

/**
 * Check if the user is authentificated. If not, redirect to login route
 */
Route::group(['middleware' => 'auth'], function () {
    
    /**
     * Customer routes
     */
    Route::resource('customers', 'CustomerController');
    Route::post('customers/store', 'CustomerController@store');
    Route::post('customers/update', 'CustomerController@update');
    Route::get('customers/destroy/{n}', 'CustomerController@destroy');
    Route::get('customers/edit/{n}', 'CustomerController@edit');
    Route::get('/', 'CustomerController@index');

    /**
     * Invoice routes
     */
    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices/{n}', 'InvoiceController@show');
    Route::get('generate', 'InvoiceController@chooseInvoice');
    Route::post('generate', 'InvoiceController@generatePDF');
    Route::post('invoices/store', 'InvoiceController@store');
    Route::post('invoices/{n}/services/store', 'InvoiceController@addService');
    Route::get('invoices/edit/{n}', 'InvoiceController@edit');
    Route::get('invoices/destroy/{n}', 'InvoiceController@destroy');
    Route::get('invoices/services/destroy/{n}', 'InvoiceController@destroyService');
    Route::post('invoices/update', 'InvoiceController@update');
    

});

/**
 * Authentification routes
 */
Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
