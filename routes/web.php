<?php

use App\User;
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

Route::get('/', 'ProductController@index');
Route::get('/home', 'ProductController@index')->name('home');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');

// akses route yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('supplierindex','ProductController@supplierindex')->name('index.suppliers');

    Route::get('membership','UserController@membership')->name('user.membership');

    Route::post('addtocart','ProductController@addToCart')->name('addToCart');

    Route::resource('transaction','TransactionController');

    Route::get('cart','ProductController@cart')->name('cart');
    Route::get('checkout', 'TransactionController@formSubmit');
    Route::get('submit_checkout', 'TransactionController@submitCheckout')->name('submitCheckout');

    Route::get('rekapitulasi-pembelian','UserController@rekapPembelian')->name('rekapPembelian');
    Route::get('rekapitulasi-pembelian-detail/{id}','UserController@rekapPembelianDetail')->name('rekapPembelianDetail');
    Route::get('rekapitulasi-poin','UserController@rekapPoin')->name('rekapPoin');

    Route::resource('supplier','SupplierController');
    Route::resource('adminproduct','AdminProductController');

});
Auth::routes();
