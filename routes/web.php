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


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/home', 'MainController@mainPage');
    Route::resource('categories', 'CategoryController');
    Route::post('category/del_img/{id}','CategoryController@del_img');
    Route::resource('products', 'ProductController');

    Route::resource('photos', 'PhotoController');
    Route::post('photos/upload', 'PhotoController@upload')->name('photos.upload');


    Route::resource('users', 'UserController');
    Route::resource('posts', 'UserController');
    Route::resource('settings', 'SettingController');
    Route::resource('cities', 'CityController');
    Route::resource('provinces', 'ProvinceController');
    Route::resource('sliders', 'SliderController');
    Route::resource('comments', 'CommentController');
    Route::resource('amazings', 'AmazingController');
//    service
    Route::resource('services','ServiceController');
    Route::post('/services/get_price','ServiceController@get_price');
    Route::post('/services/set_price','ServiceController@set_price');

});

/* امار بازدید را در اینجا قرار دهید*/
Route::middleware(['statistics'])->group(function ()
{
    Route::get('/home', 'HomeController@index')->name('home');

});
