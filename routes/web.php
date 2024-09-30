<?php

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

//Route::get('/ongkir', 'CekController@index');
//Route::post('/ongkir', 'CekController@check_ongkir');
//Route::get('/cities/{province_id}', 'CekController@getCities');

//Route::get('/cek', function () {
//    return view('cek');
//});

//Route::get('/ongkir', 'CekController@index');
//Route::post('/', 'CekController@submit');
//Route::get('/province/{id}/cities', 'CekController@getCities');

//TANPA LOGIN
Route::get('/', 'IndexController@index');
Route::get('/about', 'StaticController@about');
Route::get('/payment', 'StaticController@payment');
Route::get('/produk/{url}', 'ProdukController@detail');
Route::get('/kategori/{slug}', 'IndexController@category');

Route::group(['middleware' => ['auth','CheckRole:member']], function(){
    
    //Wishlist
    Route::get('wishlist', 'WishlistController@index');
    Route::get('wishlist/delete/{id}', 'WishlistController@destroy');
    Route::get('wishlist/{url}', 'WishlistController@store');
    
    //Address
    Route::resource('address','AddressController');
    Route::post('address/update','AddressController@update');
    Route::get('/province/{id}/cities','AddressController@getCities');
    
    //Keranjang/Pesanan
    Route::get('keranjang','PesananController@index');
    Route::post('tambahkeranjang/{id}','PesananController@store');
    Route::get('hapuskeranjang/{id}','PesananController@delete');
    Route::get('order-detail/{id}','PesananController@pesanandetail');
    Route::get('order-cancel/{id}','PesananController@cancel');
    
    //Dashboard
    Route::get('account','DashboardController@index');
    
    //Riwayat
    Route::get('history','DashboardController@order');
    
    //Checkout
    Route::get('checkout','CheckoutController@index');
    
    //Ongkir
    Route::post('/cekongkir', 'CheckoutController@submit');
    Route::post('/updateongkir', 'CheckoutController@updateongkir');
    Route::post('/updatebayar', 'CheckoutController@updatebayar');
    
});

Route::group(['middleware' => ['auth','CheckRole:admin']], function(){
    
    //Order
    Route::get('order/all', 'Admin\OrderController@index');
    Route::get('order/entry', 'Admin\OrderController@entry');
    Route::get('order/process', 'Admin\OrderController@process');
    Route::get('order/history', 'Admin\OrderController@history');
    Route::get('order/cetakPDF', 'Admin\OrderController@cetakPDF');
    Route::get('order/cetakPDF1', 'Admin\OrderController@cetakPDF1');
    Route::get('order/cetakPDF2', 'Admin\OrderController@cetakPDF2');
    Route::get('order/cetakPDF3', 'Admin\OrderController@cetakPDF3');
    //CRUD Order
    Route::resource('order','Admin\OrderController');
    //CRUD Produk
    Route::resource('product','Admin\ProductController');
    //Dashboard Admin
    Route::get('/admin/dashboard', 'Admin\AdminDBController@index');
    //CRUD Kategori
    Route::resource('category','Admin\CategoryController');
    //CRUD Order
    Route::resource('order','Admin\OrderController');
    //CRUD Warna
    Route::resource('color','Admin\ColorController');
    //Daftar User
    Route::get('/user', 'Admin\UserController@index');
    //Detail User
    Route::get('/user/detail/{id}', 'Admin\UserController@detail');
    //Hapus User
    Route::get('/user/hapus/{id}', 'Admin\UserController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
