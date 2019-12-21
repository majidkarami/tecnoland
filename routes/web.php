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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('administrator')->namespace('Backend')->group(function () {
    Route::get('/', 'MainController@mainPage');
    Route::resource('categories', 'CategoryController');
    Route::get('/categories/{id}/settings', 'CategoryController@indexSetting')->name('categories.indexSetting');
    Route::post('/categories/{id}/settings', 'CategoryController@saveSetting');
    Route::resource('attributes-group', 'AttributeGroupController');
    Route::resource('attributes-value', 'AttributeValueController');
    Route::resource('brands', 'BrandController');
    Route::resource('photos', 'PhotoController');
    Route::post('photos/upload', 'PhotoController@upload')->name('photos.upload');
    Route::resource('products', 'ProductController');
    Route::resource('coupons', 'CouponController');
    Route::get('orders', 'OrderController@index');
    Route::get('orders/lists/{id}', 'OrderController@getOrderLists')->name('orders.lists');
});
