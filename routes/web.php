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
    Route::post('category/del_img/{id}', 'CategoryController@del_img');

    Route::resource('sliders', 'SliderController');

    Route::resource('products', 'ProductController');
    /* product gallery*/
    Route::get('product/gallery', 'ProductController@gallery');
    Route::post('product/upload', 'ProductController@upload');
    Route::post('product/del_product_img/{id}', 'ProductController@del_product_img');

    /*create filter product */
    Route::get('filter', 'FilterController@index');
    Route::post('filter', 'FilterController@create');
    Route::get('product/add-filter/{id}', 'ProductController@add_filter_form');
    Route::post('product/add_filter', 'ProductController@add_filter_product');

    /*create property product */
    Route::get('item', 'ItemController@index');
    Route::post('item', 'ItemController@create');
    Route::get('product/add-item/{id}', 'ProductController@add_item_form');
    Route::post('product/add_item', 'ProductController@add_item_product');

    /*product Review*/
    Route::get('product/add-review', 'ProductController@add_review_form');
    Route::post('product/add_review', 'ProductController@add_review');
    Route::post('product/del_review_img/{id}', 'ProductController@del_review_img');


//    Route::get('order','OrderController@index');
//    Route::get('order/{id}','OrderController@view');
//    Route::delete('order/{id}','OrderController@destroy');
//    Route::post('order/set_status','OrderController@set_status');

//    Route::get('comment','CommentController@index');
//    Route::post('ajax/set_comment_status','CommentController@set_comment_status');
//    Route::delete('comment/{id}','CommentController@delete');
//
//    Route::get('question','QuestionController@index');
//    Route::post('ajax/set_status_question','QuestionController@set_status');
//    Route::delete('question/{id}','QuestionController@delete');
//    Route::post('question/add','QuestionController@add');
//
//    Route::get('setting/pay','AdminController@pay_setting_form');
//    Route::post('setting/pay','AdminController@pay_setting');

    Route::resource('users', 'UserController');
    Route::resource('settings', 'SettingController');
    Route::resource('cities', 'CityController');
    Route::resource('provinces', 'ProvinceController');
// product amazing
    Route::resource('amazings', 'AmazingController');
//    service guaranty
    Route::resource('services', 'ServiceController');
    Route::post('/services/get_price', 'ServiceController@get_price');
    Route::post('/services/set_price', 'ServiceController@set_price');


    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/posts', 'PostController');
        Route::resource('categories', 'PostCategoryController');
        Route::resource('comments', 'PostCommentController');
        Route::post('/actions/{id}', 'PostCommentController@actions')->name('comments.actions');
    });
});

/* امار بازدید را در اینجا قرار دهید*/
Route::middleware(['statistics'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

});
