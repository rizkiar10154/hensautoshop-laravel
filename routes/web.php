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



Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Hensautoshop\PageController@index');
    Route::get('/daftar', 'Hensautoshop\PageController@daftar');
    Route::get('/contact', 'Hensautoshop\PageController@contact');
    Route::post('/contact', 'Hensautoshop\KontakController@store');

    Route::get('/register', 'Hensautoshop\RegisterController@index');
    Route::get('/register/create', 'Hensautoshop\RegisterController@create');
    Route::get('/register/{brand}', 'Hensautoshop\RegisterController@show');
    Route::post('/register', 'Hensautoshop\RegisterController@store');





    // Route::get('/home'  , 'Admin\HomeController@index')->name('home');



});


Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    // Authentication Routes...
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('/registrasi', 'Admin\RegistrasiController@index');
    Route::patch('/registrasi/edit/{id}', 'Admin\RegistrasiController@update')->name('updateRegistrasi');

    Route::get('/kategori/create', 'Admin\KategoriController@create');
    Route::get('/kategori', 'Admin\KategoriController@index');
    Route::post('/kategori', 'Admin\kategoriController@store');

    //top up
    Route::get('/topup', 'Admin\TopUpController@create');
    Route::post('/topup', 'Admin\TopUpController@store');

    //refound
    Route::get('/refound', 'Admin\RefoundController@create');
    Route::post('/refound', 'Admin\RefoundController@store');
    Route::post('/refound/konfirmasi', 'Admin\RefoundController@konfirmasi');

    //riwayat resto pay
    Route::get('/riwayat_henspay', 'Admin\RiwayatHensPayController@index');
    Route::get('/riwayat_henspay/{riwayat_henspay}', 'Admin\DetailController@show')->name('detail_riwayat');


    Route::get('/brand', 'Admin\BrandController@index');

    Route::get('/konsumen', 'Admin\KonsumenController@index');

    Route::get('/rekomendasi', 'Admin\RekomendasiController@index');

    Route::get('/order', 'Admin\OrderController@index');

    Route::get('/contact', 'Admin\KontakController@index');

    Route::get('/accesories/{accesories}', 'Admin\AccesoriesController@show')->name('accesories');


    Route::get('/detail/{detail}', 'Admin\DetailController@show')->name('detail_order');

    Route::get('/profitharian', 'Admin\ProfitController@harian');

    Route::get('/profitbulanan', 'Admin\ProfitController@bulanan');

    Route::get('/clear-cache', function () {
        $exitCode = \Illuminate\Support\Facades\Artisan::call('cache:clear');
        $exitCode1 = \Illuminate\Support\Facades\Artisan::call('config:clear');
        // return what you want
        return $exitCode;
    });

    Route::get('/satuan/create', 'Admin\SatuanController@create');
    Route::get('/satuan', 'Admin\SatuanController@index');
    Route::post('/satuan', 'Admin\SatuanController@store');
});





//
//// Registration Routes...
Route::get('registerAdmin', 'Admin\Auth\RegisterController@showRegistrationForm')->name('registerAdmin');
Route::post('registerAdmin', 'Admin\Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//
