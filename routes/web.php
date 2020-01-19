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

/* login admin*/
Route::get(setting('url_admin'), 'admin\MainController@admin_login');
// captcha
Route::get('/refresh_captcha', 'Auth\LoginController@refreshCaptcha');

Route::middleware(['load.admin.data','check.admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/dashboard', 'MainController@index');
    Route::get('/statistic', 'MainController@statistic')->name('statistic.index');
    Route::get('/income', 'MainController@income')->name('income.index');
    Route::resource('categories', 'CategoryController');
    Route::post('category/del_img/{id}', 'CategoryController@del_img');

    Route::resource('sliders', 'SliderController');

    Route::resource('products', 'ProductController');
    /* product gallery*/
    Route::get('product/gallery', 'ProductController@gallery');
    Route::post('product/upload', 'ProductController@upload');
    Route::post('product/del_product_img/{id}', 'ProductController@del_product_img');

    /*create filter product */
    Route::get('filter', 'FilterController@index')->name('filter.index');
    Route::post('filter', 'FilterController@create');
    Route::get('product/add-filter/{id}', 'ProductController@add_filter_form');
    Route::post('product/add_filter', 'ProductController@add_filter_product');

    /*create property product */
    Route::get('item', 'ItemController@index')->name('item.index');;
    Route::post('item', 'ItemController@create');
    Route::get('product/add-item/{id}', 'ProductController@add_item_form');
    Route::post('product/add_item', 'ProductController@add_item_product');

    /*product Review*/
    Route::get('product/add-review', 'ProductController@add_review_form');
    Route::post('product/add_review', 'ProductController@add_review');
    Route::post('product/del_review_img/{id}', 'ProductController@del_review_img');

    /*product comment*/
    Route::get('comment', 'CommentController@index')->name('comment.index');
    Route::post('ajax/set_comment_status', 'CommentController@set_comment_status');
    Route::delete('comment/{id}', 'CommentController@delete');

    /*product question*/
    Route::get('question', 'QuestionController@index')->name('question.index');
    Route::post('ajax/set_status_question', 'QuestionController@set_status');
    Route::delete('question/{id}', 'QuestionController@delete');
    Route::post('question/add', 'QuestionController@add')->name('question.add');

    /*product order*/
    Route::get('order', 'OrderController@index')->name('order.index');
    Route::get('order/{id}', 'OrderController@view');
    Route::delete('order/{id}', 'OrderController@destroy');
    Route::post('order/set_status', 'OrderController@set_status');

    /*discount*/
    Route::resource('discounts', 'DiscountController', ['except' => ['show']]);
    Route::resource('gift_cart', 'GiftCartController', ['except' => ['show']]);

    Route::resource('users', 'UserController');

    Route::resource('posts', 'UserController');

    Route::get('setting/pub', 'SettingController@pub_setting_form')->name('pub_setting_form.create');
    Route::post('setting/pay', 'SettingController@pay_setting')->name('pay_setting.store');
    Route::get('setting/pay', 'SettingController@pay_setting_form')->name('pay_setting_form.create');
    Route::post('setting/pay', 'SettingController@pay_setting')->name('pay_setting.store');


    Route::resource('cities', 'CityController');
    Route::resource('provinces', 'ProvinceController');

// product amazing
    Route::resource('amazings', 'AmazingController');
//    service guaranty
    Route::resource('services', 'ServiceController');
    Route::post('/services/get_price', 'ServiceController@get_price');
    Route::post('/services/set_price', 'ServiceController@set_price');

    /*send newsletter in user*/
    Route::group(['prefix' => '/newsletter'], function () {
        Route::get('/', 'NewsLetterController@index')->name('admin.newsletter.index');

        Route::get('/create', 'NewsLetterController@create')->name('admin.newsletter.create');
        Route::post('/create', 'NewsLetterController@store')->name('admin.newsletter.store');
        Route::delete('/destroy/{id}', 'NewsLetterController@destroy')->name('admin.newsletter.destroy');

        Route::get('/create/phone', 'NewsLetterController@create_phone')->name('admin.newsletter.phone.create');
        Route::post('/create/phone', 'NewsLetterController@store_phone')->name('admin.newsletter.phone.store');
    });


    Route::prefix('posts')->name('posts.')->group(function () {
        Route::resource('/blog', 'PostController');
        Route::resource('categories', 'PostCategoryController');
    });

});

Route::post('email/register', 'User\NewsLetterController@email_register')->name('email.register');

/* امار بازدید را در اینجا قرار دهید*/
Route::middleware(['statistics'])->namespace('User')->group(function ()
{
    Route::get('/','SiteController@index');
    Route::get('product/{code}/{title}','SiteController@show');
    Route::get('Cart','SiteController@show_cart');

    Route::get('category/{cat1}','SearchController@cat1');
    Route::get('search/{cat1}/{cat2}/{cat3}','SearchController@search');


    Route::get('Compare/{product1}','SiteController@compare');
    Route::get('Compare/{product1}/{product2}','SiteController@compare');
    Route::get('Compare/{product1}/{product2}/{product3}','SiteController@compare');
    Route::get('Compare/{product1}/{product2}/{product3}/{product4}','SiteController@compare');

    Route::get('search','SiteController@search');

});
