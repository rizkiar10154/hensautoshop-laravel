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


Route::prefix('v1')->namespace('Api')->group(function () {

    //    //List Semua Data
    //    Route::get('konsumen','KonsumenController@index');
    //    Route::get('brand','BrandController@index');
    //
    //
    //    //List Satu Data
    //    Route::get('konsumen/phone/{phone}','KonsumenController@phone');
    //    Route::get('konsumen/{id}','KonsumenController@show');
    //
    //    Route::get('brand/{id}','BrandController@show');


    //Buat Baru Satu Data
    //    Route::post('konsumen','KonsumenController@store');


    //Update Satu Data
    //    Route::put('konsumen/{id}','KonsumenController@store');


    //Delete Satu Data
    //    Route::delete('konsumen/{id}','KonsumenController@destroy');

    Route::POST('konsumen/topup', 'KonsumenController@TopUp');
    Route::resource('konsumen', 'KonsumenController', ['only' => ['store', 'show', 'update', 'index']]);
    Route::GET('brand/{brand}/laporan', 'BrandController@laporan');
    Route::resource('brand', 'BrandController', ['only' => ['show', 'update', 'index']]);
    Route::resource('kurir', 'KurirController', ['only' => ['store', 'show', 'update', 'index', 'destroy']]);
    Route::POST('accesories/{accesories}/update', 'AccesoriesController@updateWithPhoto');
    Route::resource('accesories', 'AccesoriesController', ['only' => ['store', 'update', 'index', 'destroy']]);

    Route::POST('order/struk', 'OrderController@struk');
    Route::GET('order/pengantaran', 'OrderController@pengantaran');
    Route::GET('order/historipengantaran', 'OrderController@historipengantaran');
    Route::GET('order/laporanpengantaran', 'OrderController@laporanpengantaran');
    Route::POST('order/{order}/pembayaran', 'OrderController@pembayaran');
    Route::POST('order/{order}/changeMetodeBayar', 'OrderController@changeMetodeBayar');
    Route::resource('order', 'OrderController', ['only' => ['store', 'update', 'index', 'show']]);

    Route::resource('favorit', 'FavoritController', ['only' => ['store', 'destroy', 'show']]);
    Route::get('hensautoshop/login/{phone}', 'AuthController@hensautoshop');
    Route::get('brandpartner/login/{phone}', 'AuthController@brandpartner');

    Route::resource('rekomendasi', 'RekomendasiController', ['only' => ['store']]);
    Route::resource('uat', 'UatController', ['only' => ['store']]);

    Route::GET('satuan', 'AccesoriesController@showSatuan');
});





//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
