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
Route::any('/404', function() {
    return View::make('frontend/v1/errors/404', [], 404);
});
############################### FRONTEND ROUTE ############################################
# Guest route for frontend
Route::get('/','Frontend\HomeController@index')->name('home');
Route::get('trang-chu','Frontend\HomeController@index');
Route::get('gio-hang','Frontend\CartController@index');
Route::get('thanh-toan','Frontend\CartController@payment');

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
Route::post('add-to-cart','Frontend\CartController@addToCart');
Route::get('gio-hang','Frontend\CartController@index')->name('cart');
Route::get('thanh-toan','Frontend\CartController@checkout')->name('checkout');
Route::post('update_quantity','Frontend\CartController@updateQtty');
Route::post('remove_item','Frontend\CartController@removeItem');

# order-management route for frontend
Route::get('quan-ly-dat-hang/{id}.html','Frontend\OrderManagementController@index')->name('order-list');
Route::get('chi-tiet-don-hang/{id}.html','Frontend\OrderManagementController@getOrderDetails')->name('order-detail');

# search form result
Route::get('search','Frontend\SearchController@getSearchResult')->name('search');

# auto search key word
Route::get('find', 'Frontend\SearchController@getSearchHint');

# quickview
Route::post('quick-view', 'Frontend\ProductController@getQuickView');

# get customer-info
Route::post('get_member_info','Frontend\CustomerController@getMemberInfo');
Route::post('update_member_info/{$id}','Frontend\CustomerController@updateMemberInfo')->name('update.member');

# order route
Route::post('dat-hang','Frontend\OrderController@order')->name('order');
Route::get('dat-hang-thanh-cong','Frontend\OrderController@orderSuccess')->name('success');

# address ship fee route
Route::post('ship-fee','Frontend\ShipFeeController@getFee');
# user infor
Route::get('chi-tiet-nguoi-dung', 'Frontend\UserController@index')->name('user-detail');

############################### BACKEND ROUTE ############################################
# Guest route for backend admin
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'as' => 'admin.'
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
        Route::get('index','ProfileController@index')->name('index');
        Route::post('update','ProfileController@update')->name('update');
    });
    # System
    Route::group(['prefix' => 'system', 'as' => 'system.'], function () {
        Route::get('general','SystemController@general')->name('general');
        Route::post('general','SystemController@postGeneral')->name('general.update');
        Route::get('advanced','SystemController@advanced')->name('advanced');
        Route::post('advanced','SystemController@postAdvanced')->name('advanced.update');
    });
    # Product Category
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::post('/table', 'CategoryController@dataTable')->name('table');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::post('/sync', 'CategoryController@sync')->name('sync');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('delete');
    });
    # Product Route
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/table', 'ProductController@dataTable')->name('table');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::post('/sync', 'ProductController@sync')->name('sync');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');
        Route::delete('/delete/{id}', 'ProductController@destroy')->name('delete');
    });
    # Product Attribute Route
    Route::group(['prefix' => 'attribute', 'as' => 'attribute.'], function () {
        Route::get('/', 'ProductAttributeController@index')->name('index');
        Route::get('/create', 'ProductAttributeController@create')->name('create');
        Route::post('/store', 'ProductAttributeController@store')->name('store');
        Route::get('/edit/{id}', 'ProductAttributeController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductAttributeController@update')->name('update');
        Route::delete('/delete/{id}', 'ProductAttributeController@destroy')->name('delete');
    });
    # Product Unit Route
    Route::group(['prefix' => 'unit', 'as' => 'unit.'], function () {
        Route::get('/', 'ProductUnitController@index')->name('index');
        Route::get('/create', 'ProductUnitController@create')->name('create');
        Route::post('/store', 'ProductUnitController@store')->name('store');
        Route::get('/edit/{id}', 'ProductUnitController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductUnitController@update')->name('update');
        Route::delete('/delete/{id}', 'ProductUnitController@destroy')->name('delete');
    });
    # Order Route
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/table', 'OrderController@dataTable')->name('table');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::post('/sync', 'OrderController@sync')->name('sync');
        Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('/update/{id}', 'OrderController@update')->name('update');
        Route::delete('/delete/{id}', 'OrderController@destroy')->name('delete');
    });
    # Customer Route
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/create', 'CustomerController@create')->name('create');
        Route::post('/store', 'CustomerController@store')->name('store');
        Route::post('/sync', 'CustomerController@sync')->name('sync');
        Route::post('/table', 'CustomerController@dataTable')->name('table');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('edit');
        Route::post('/update/{id}', 'CustomerController@update')->name('update');
        Route::delete('/delete/{id}', 'CustomerController@destroy')->name('delete');
    });
    # Report Route
    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/', 'ReportController@index')->name('index');
        Route::get('/create', 'ReportController@create')->name('create');
        Route::post('/store', 'ReportController@store')->name('store');
        Route::get('/edit/{id}', 'ReportController@edit')->name('edit');
        Route::post('/update/{id}', 'ReportController@update')->name('update');
        Route::delete('/delete/{id}', 'ReportController@destroy')->name('delete');
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
    # Email Template Route
    Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
        Route::get('/', 'EmailTemplateController@index')->name('index');
        Route::get('/create', 'EmailTemplateController@create')->name('create');
        Route::post('/table', 'EmailTemplateController@dataTable')->name('table');
        Route::post('/store', 'EmailTemplateController@store')->name('store');
        Route::get('/edit/{id}', 'EmailTemplateController@edit')->name('edit');
        Route::post('/update/{id}', 'EmailTemplateController@update')->name('update');
        Route::delete('/delete/{id}', 'EmailTemplateController@destroy')->name('delete');
    });
     # Shipping Route
    Route::group(['prefix' => 'shipping', 'as' => 'shipping.'], function () {
        Route::get('/', 'ShippingController@index')->name('index');
        Route::get('/create', 'ShippingController@create')->name('create');
        Route::post('/table', 'ShippingController@dataTable')->name('table');
        Route::post('/store', 'ShippingController@store')->name('store');
        Route::get('/edit/{id}', 'ShippingController@edit')->name('edit');
        Route::post('/update/{id}', 'ShippingController@update')->name('update');
        Route::delete('/delete/{id}', 'ShippingController@destroy')->name('delete');
        Route::put('/update-json','ShippingController@updateJson')->name('update.json');
    });

});


#################test api in web################
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
Route::get('/test/api',function(){

    $data = [
        "pageSize" => 100,
        "orderBy" => "id",
        "orderDirection" =>"desc"
    ];
    $client = new Client([
        'headers' => [
            'Retailer'      => 'phukiengiadung',
            'Authorization' => 'Bearer ' . Session::get('access_token')
        ]
    ]);
    $request = $client->get('https://public.kiotapi.com/orders',[
        RequestOptions::JSON => $data
    ]);
    $data = $request->getBody();
    dd(json_decode($data));
    $data = [
        "branchId"=> 38930, //dm cai nay require khi post data
        "soldById"=>80879,
        "cashierId"=>80882,
        "discount"=>0.0,
        "description"=>"day la ghi chu",
        "method"=>"chuyen khoan",
        "totalPayment"=> 0.0,
        "makeInvoice"=>false,
        "orderDetails" => [
            [
                "productId"=> 3587832,
                "productCode"=> "12",
                "productName"=>"ten hang 1 (goi)",
                "quantity"=> 1,
                "price"=> 29999.0,
                "discount"=> 0.0,
                "discountRatio"=> 0
            ]
        ],
        "customer"=>[
            "id"=> 1195906,
            "code"=> "KH000009",
            "name"=>"nguyen hue"
        ]
    ];


    //dd(Session::get('access_token'));
    $dt = [
        'categoryName'=>'Danh muc api41'
    ];
    $client = new Client([
        'headers' => [
            'Retailer' => 'phukiengiadung',
            'Authorization' => 'Bearer ' . Session::get('access_token')
        ]
    ]);
    //GuzzleHttp\RequestOptions::JSON
    $request = $client->post('https://public.kiotapi.com/orders', [
        GuzzleHttp\RequestOptions::JSON => $data
    ]);
    dd(json_decode($request->getBody()));
    //dd(GuzzleHttp\RequestOptions::JSON)
    $request = $client->post('https://public.kiotapi.com/orders', [
       GuzzleHttp\RequestOptions::JSON => $data
    ]);
    dd($request);
    //$data =  $request->getBody()->read(1024);
    dd(json_decode($data));
    dd($_COOKIE['access_token']);
    $data = [
        'orderBy' => 'name'
    ];
    $client = new Client();
    //$client->setDefaultOption('headers', $headers);
    $url1 = 'https://public.kiotapi.com/categories';
    $request = $client->get($url, [
        'headers' => config('kiot.headers'),
        GuzzleHttp\RequestOptions::JSON => $data
    ]);
    $data = $request->getBody();
    dd(json_decode($data));
    $code = $response->getStatusCode();
    dd($code);

    dd($response);
    dd('dm no test thi dc');
});
