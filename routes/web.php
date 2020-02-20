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
Route::get(setting('url_admin'), 'Admin\MainController@admin_login');

// captcha
Route::get('/refresh_captcha', 'Auth\LoginController@refreshCaptcha');
// middleware(['load.admin.data','check.admin'])
Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/dashboard', 'MainController@index')->name('admin.dashboard');
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

    Route::get('setting/pub', 'SettingController@pub_setting_form')->name('pub_setting_form.create');
    Route::post('setting/pay', 'SettingController@pay_setting')->name('pay_setting.store');
    Route::get('setting/pay', 'SettingController@pay_setting_form')->name('pay_setting_form.create');
    Route::post('setting/pay', 'SettingController@pay_setting')->name('pay_setting.store');


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

    Route::resource('games', 'GameController');
    Route::get('games/active/{id}', 'GameController@active')->name('games.active');
    /*send newsletter in user*/
    Route::group(['prefix' => '/newsletter'], function () {
        Route::get('/', 'NewsLetterController@index')->name('admin.newsletter.index');

        Route::get('/create', 'NewsLetterController@create')->name('admin.newsletter.create');
        Route::post('/create', 'NewsLetterController@store')->name('admin.newsletter.store');
        Route::delete('/destroy/{id}', 'NewsLetterController@destroy')->name('admin.newsletter.destroy');


        Route::get('/create/phone', 'NewsLetterController@create_phone')->name('admin.newsletter.phone.create');
        Route::post('/create/phone', 'NewsLetterController@store_phone')->name('admin.newsletter.phone.store');
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/posts', 'PostController');
        Route::resource('categories', 'PostCategoryController');
        Route::resource('comments', 'PostCommentController');
        Route::post('/actions/{id}', 'PostCommentController@actions')->name('comments.actions');
        Route::get('/post/{id}/details', 'PostController@details')->name('posts.details');
        Route::post('/post/{id}/upload', 'PostController@upload')->name('posts.upload');
        Route::post('/post/details', 'PostController@create_details')->name('posts.create.details');
        Route::post('/post/del_post_img/{id}', 'PostController@del_post_img')->name('posts.del_img');

    });

});

Route::post('email/register', 'User\NewsLetterController@email_register')->name('email.register');

/* امار بازدید را در اینجا قرار دهید*/
Route::middleware(['statistics'])->namespace('User')->group(function () {
    Route::get('/', 'SiteController@index');
    Route::get('product/{code}/{title}', 'SiteController@show');
    Route::get('Cart', 'SiteController@show_cart');

    // Route::get('category/{cat1}','SearchController@cat1');
    // Route::get('search/{cat1}/{cat2}/{cat3}','SearchController@search');


    Route::get('Compare/{product1}', 'SiteController@compare');
    Route::get('Compare/{product1}/{product2}', 'SiteController@compare');
    Route::get('Compare/{product1}/{product2}/{product3}', 'SiteController@compare');
    Route::get('Compare/{product1}/{product2}/{product3}/{product4}', 'SiteController@compare');

    Route::get('Search', 'SiteController@search')->name('search.header');
    Route::get('Search/mob', 'SiteController@search_mob')->name('search.header.mob');

});

Route::post('site/ajax_set_service', 'User\SiteController@set_service');
Route::post('Cart', 'User\SiteController@cart');

Route::post('ajax_get_compare_product', 'User\SiteController@get_compare_product');
Route::post('site/ajax_del_cart', 'User\SiteController@del_cart');
Route::post('site/ajax_change_cart', 'User\SiteController@change_cart');
Route::post('site/ajax_check_login', 'User\SiteController@check_login');
Route::post('shop/get_ajax_shahr', 'User\ShopController@get_ajax_shahr');
Route::post('shop/add_address', 'User\ShopController@add_address');
Route::post('shop/edit_address_form', 'User\ShopController@edit_address_form');
Route::post('shop/edit_address/{address_id}', 'User\ShopController@edit_address');
Route::delete('remove_address/{id}', 'User\ShopController@remove_address');
Route::match(['get', 'post'], 'review', 'User\ShopController@review')->name('user.review');
Route::get('Payment', 'User\ShopController@Payment')->name('user.Payment');
Route::post('Payment', 'User\ShopController@Pay');
Route::get('user/order', 'User\UserController@show_order');

Route::get('Shipping', 'User\ShopController@Shipping')->name('user.Shipping');


Route::middleware(['auth'])->namespace('User')->group(function () {
    Route::get('AddComment/{product_id}', 'SiteController@comment_form');
    Route::post('site/add_score', 'SiteController@add_score')->name('user.add.score');
    Route::post('site/add_comment', 'SiteController@add_comment')->name('user.add.comment');
    Route::post('add_question', 'SiteController@add_question');

    Route::get('user/profile', 'UserController@index')->name('user.profile');
    Route::get('user/orders', 'UserController@orders')->name('user.orders');
    Route::get('user/favorites', 'UserController@favorites')->name('user.favorites');
    Route::delete('user/remove_favorites/{id}', 'UserController@remove_favorites');
    Route::get('user/comment', 'UserController@comment')->name('user.comment');
    Route::get('user/question', 'UserController@question')->name('user.question');
    Route::get('user/address', 'UserController@address')->name('user.address');

    Route::post('site/check_gift_cart', 'SiteController@check_gift_cart');
    Route::get('user/gift_cart', 'UserController@gift_cart');
    /*bookmark*/
    Route::post('site/add/bookmark', 'SiteController@marked')->name('book.marked');
    Route::post('site/delete/bookmark', 'SiteController@del_marked')->name('del.mark');
});


Route::get('user/order/print', 'User\UserController@print_order');
Route::get('user/order/create_barcode', 'User\UserController@create_barcode');
Route::get('user/order/pdf', 'User\UserController@create_pdf');
Route::post('order', 'User\ShopController@update_order');
Route::get('order', 'User\ShopController@update_order2');

Route::post('ajax/set_filter_product', 'User\SearchController@ajax_search');
Route::post('site/check_discount_code', 'User\SiteController@check_discount_code');

Route::post('site/ajax_get_tab_data', 'User\SiteController@get_tab_data');

Route::get('category/{cat1}/{cat2}', 'User\SearchController@show_cat1');
Route::get('category/{cat1}/{cat2}/{cat3}', 'User\SearchController@show_cat_product');
Route::get('category/{cat1}/{cat2}/{cat3}/{cat4}', 'User\SearchController@show_cat4');

Route::post('user/contact_us', 'User\NewsLetterController@contact_us')->name('user.contact_us');

/* route Game*/
Route::get('Techno/Game', 'User\GameController@index')->name('techno.game');
Route::get('Techno/Game/{slug}', 'User\GameController@show')->name('techno.show.game');

Route::view('Privacy-Policy', 'technoland/other/privacy-policy')->name('privacy.policy');
Route::view('regulation', 'technoland/other/regulation')->name('regulation');
Route::view('about', 'technoland/other/about')->name('technoland.about');
Route::view('contact', 'technoland/other/contact')->name('technoland.contact');
Route::view('return/policy', 'technoland/other/return-policy')->name('return.policy');
Route::view('guarantee/origin', 'technoland/other/guarantee-origin')->name('guarantee.origin');
Route::view('price/guarantee', 'technoland/other/price-guarantee')->name('price.guarantee');

//Route::get('test',function (){
//    Session::forget('gift_list');
//});

Route::prefix('blog')->namespace('User')->group(function () {
    Route::get('/', 'PostController@index')->name('user.blog.posts.index');
    Route::get('/{slug}', 'PostController@show')->name('user.blog.posts.show');
    Route::post('/comments', 'CommentController@store')->name('user.blog.comments.store');
    Route::post('/comments/reply', 'CommentController@reply')->name('user.blog.comments.reply');
});

Route::prefix('blog')->namespace('User')->middleware('auth')->group(function () {
    Route::post('/post/like', 'PostController@like')->name('user.blog.like');
    Route::post('/post/dislike', 'PostController@dislike')->name('user.blog.dislike');

});

