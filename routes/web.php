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
Route::any('/404', function () {
    return View::make('frontend/v1/errors/404', [], 404);
});
############################### FRONTEND ROUTE ############################################
# @TODO
#Route for newsletter email

# Guest route for frontend
Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('trang-chu', 'Frontend\HomeController@index');
Route::get('gio-hang', 'Frontend\CartController@index');
Route::get('thanh-toan', 'Frontend\CartController@payment');
Route::get('lien-he', 'Frontend\HomeController@contact')->name('contact');
Route::post('lien-he', 'Frontend\ContactController@store')->name('store.contact');
Route::get('bao-gia', 'Frontend\HomeController@price')->name('price');
Route::get('gioi-thieu', 'Frontend\HomeController@about')->name('about');
Route::get('tin-tuc', 'Frontend\HomeController@post')->name('post');
# User route for frontend auth
Route::group([
    'namespace' => 'Frontend\Auth',
    'as' => 'user.',
], function () {
    Route::get('dang-nhap', 'AuthController@loginForm');
    Route::post('dang-nhap', 'AuthController@login')->name('login');
    Route::get('dang-ki', 'AuthController@registerForm');
    Route::post('dang-ki', 'AuthController@register')->name('register');
    Route::get('dang-xuat', 'AuthController@logout')->name('logout');
});
# User route for frontend
Route::get('danh-muc', 'Frontend\CategoryController@index')->name('category');
Route::get('danh-muc-giam-gia', 'Frontend\CategoryController@getDiscountProducts')->name('category-discount');
Route::get('danh-muc-moi', 'Frontend\CategoryController@getNewProducts')->name('category-new');

Route::get('danh-muc/{slug}.html', 'Frontend\CategoryController@getCategory')->name('child-category');
Route::get('san-pham/{slug}.html', 'Frontend\ProductController@getDetail')->name('detail');

# Shopping cart route for frontend
Route::post('add-to-cart', 'Frontend\CartController@addToCart');
Route::get('gio-hang', 'Frontend\CartController@index')->name('cart');
Route::get('thanh-toan', 'Frontend\CartController@checkout')->name('checkout');
Route::post('update_quantity', 'Frontend\CartController@updateQtty');
Route::post('remove_item', 'Frontend\CartController@removeItem');

# order-management route for frontend
Route::get('quan-ly-dat-hang/{id}.html', 'Frontend\OrderManagementController@index')->name('order-list');
Route::get('chi-tiet-don-hang/{id}.html', 'Frontend\OrderManagementController@getOrderDetails')->name('order-detail');

# search form result
Route::get('search', 'Frontend\SearchController@getSearchResult')->name('search');

# auto search key word
Route::get('find', 'Frontend\SearchController@getSearchHint');

# get customer-info
Route::post('get_member_info', 'Frontend\CustomerController@getMemberInfo');
Route::post('update_member_info/{$id}', 'Frontend\CustomerController@updateMemberInfo')->name('update.member');

# order route
Route::post('dat-hang', 'Frontend\OrderController@order')->name('order');
Route::get('dat-hang-thanh-cong', 'Frontend\OrderController@orderSuccess')->name('success');

# user infor
Route::get('chi-tiet-nguoi-dung', 'Frontend\UserController@index')->name('user-detail');

############################### BACKEND ROUTE ############################################
# Guest route for backend admin
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/login-page', 'Auth\AuthController@loginForm');
    Route::post('/login-page', 'Auth\AuthController@login')->name('login');
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
});
# Admin route for backend admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth.backend'],
    'namespace' => 'Backend',
    'as' => 'admin.',
], function () {
    # Backend Home Route
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    # Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('index', 'ProfileController@index')->name('index');
        Route::post('update', 'ProfileController@update')->name('update');
    });
    # System
    Route::group(['prefix' => 'system', 'as' => 'system.'], function () {
        Route::get('general', 'SystemController@general')->name('general');
        Route::post('general', 'SystemController@postGeneral')->name('general.update');
        Route::get('advanced', 'SystemController@advanced')->name('advanced');
        Route::post('advanced', 'SystemController@postAdvanced')->name('advanced.update');
    });
    # Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::post('/table', 'CategoryController@dataTable')->name('table');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('delete');
    });
    # Contact
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/', 'ContactController@index')->name('index');
        Route::post('/table', 'ContactController@dataTable')->name('table');
        Route::get('/create', 'ContactController@create')->name('create');
        Route::post('/store', 'ContactController@store')->name('store');
        Route::get('/edit/{id}', 'ContactController@edit')->name('edit');
        Route::post('/update/{id}', 'ContactController@update')->name('update');
        Route::delete('/delete/{id}', 'ContactController@destroy')->name('delete');
    });
    # Post
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::post('/table', 'PostController@dataTable')->name('table');
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/store', 'PostController@store')->name('store');
        Route::get('/edit/{id}', 'PostController@edit')->name('edit');
        Route::post('/update/{id}', 'PostController@update')->name('update');
        Route::delete('/delete/{id}', 'PostController@destroy')->name('delete');
    });
    # Product Route
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/table', 'ProductController@dataTable')->name('table');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');
        Route::delete('/delete/{id}', 'ProductController@destroy')->name('delete');
    });
    # Order Route
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/table', 'OrderController@dataTable')->name('table');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('/update/{id}', 'OrderController@update')->name('update');
        Route::delete('/delete/{id}', 'OrderController@destroy')->name('delete');
    });
    # Customer Route
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/create', 'CustomerController@create')->name('create');
        Route::post('/store', 'CustomerController@store')->name('store');
        Route::post('/table', 'CustomerController@dataTable')->name('table');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('edit');
        Route::post('/update/{id}', 'CustomerController@update')->name('update');
        Route::delete('/delete/{id}', 'CustomerController@destroy')->name('delete');
    });
    # User Route
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::post('/update/{id}', 'UserController@update')->name('update');
        Route::delete('/delete/{id}', 'UserController@destroy')->name('delete');
    });
});
