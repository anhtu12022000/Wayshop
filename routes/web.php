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

Route::get('vue', function() {
    return view('welcome');
});




// use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// Route::get('quyen', function() {
//     // Role::create(['name' => 'Administrator']);
//     Auth::user()->assignRole('Administrator');
// });


// Route::get('/', 'IndexController@index');
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'language'], function () {

Route::get('/404','IndexController@notFound')->name('404');


// Front-End
Route::match(['get','post'], '/', 'IndexController@index')->name('home');
Route::get('/home', 'HomeController@index')->middleware(['auth','verified']);
Route::match(['get','post'], 'shop', 'IndexController@shop');
Route::match(['get','post'], '/aboutus', 'IndexController@aboutus');
Route::match(['get','post'], '/checkout', 'IndexController@checkout');

Route::group(['middleware' => 'auth'], function() {
    Route::match(['get','post'], '/order-review', 'IndexController@orderReview');
    Route::post('/place-order', 'IndexController@placeOrder');
    Route::get('/thanks', 'IndexController@thanks');

    //Paypan
    Route::group(['prefix' => 'paypal'], function() {
        Route::get('/checkout', 'PaypalController@paypalCheckout');
        Route::get('/checkout-success', 'PaypalController@paypalCheckoutSuccess');
    });
});

Route::match(['get','post'], '/shop-detail', 'IndexController@detail');
Route::match(['get','post'], '/my-account', 'IndexController@account');
Route::match(['get','post'], '/wishlist', 'IndexController@wishlist');
Route::match(['get','post'], '/service', 'IndexController@service');
Route::match(['get','post'], '/contact-us', 'IndexController@contact');
Route::match(['get','post'], '/blog', 'IndexController@blog');

Route::get('/post-detail/{slug}.html', 'IndexController@postDetail');
Route::get('/product-detail/{slug}.html', 'IndexController@productDetail');
Route::get('/banner-advertisement/{slug}.html', 'IndexController@productSlide');

Route::post('/product-comment', 'IndexController@productComment');
Route::post('/post-comment', 'IndexController@postComment');

Route::group(['prefix' => 'shop'], function() {
    Route::match(['get','post'], '/', 'IndexController@shop');
    Route::get('{slug}.html', 'IndexController@productCate');
});

Route::group(['prefix' => 'cart'], function() {
    Route::match(['get','post'], '/', 'IndexController@cart');
    Route::get('/get-cart', 'IndexController@getCarts');
    Route::get('/product-detail/get-cart', 'IndexController@getCarts');
    Route::get('/orders-cart', 'IndexController@getOrdersCarts')->name('cart/orderscart');
    Route::post('/apply-coupons', 'IndexController@applyCoupons');
    Route::post('/confirm-order/{id}', 'BackEnd\BillController@confirmOrder');
});



Route::get('/search', 'IndexController@search')->name('search')->where(['keyword' => '[A-Za-z0-9]+']);
Route::get('/searchajax/{keyword}', 'IndexController@searchAjax')->where(['keyword' => '[A-Za-z0-9]+']);

Route::match(['get','post'], '/contact', 'IndexController@contact');

Route::namespace('Frontend')->group(function () {


    Route::group(['middleware' => 'guest'], function() {
        Route::get('auth/redirect', 'AuthController@redirectToProvider');
        Route::get('auth/callback', 'AuthController@handleProviderCallback');
    });

    Route::group(['prefix' => 'user'], function() {
        Route::post('/register', 'AccountController@register');
        Route::post('/login', 'AccountController@login');
        Route::post('/change-password/{id}', 'AccountController@changePassword')->where(['id' => '[0-9]+']);
        Route::post('/change-information/{id}', 'AccountController@changeInformation')->where(['id' => '[0-9]+']);
        Route::get('/logout', 'AccountController@logout');
    });

    //Ajax
    Route::post('/add-cart', 'CartController@addCart');
    Route::post('/product-detail/add-cart', 'CartController@addCart');
    Route::post('/delete-cart/{id}', 'CartController@deleteCart')->where(['id' => '[0-9]+']);
    Route::post('/update-cart/{id}', 'CartController@updateCart')->where(['id' => '[0-9]+']);

    Route::group(['middleware' => 'auth'], function() {
        //Paypan
        Route::group(['prefix' => 'paypal'], function() {
            Route::get('/checkout/{order_id}', 'PaypalController@getExpressCheckout')->name('paypal.checkout');
            Route::get('/checkout-success/{order_id}', 'PaypalController@paypalCheckoutSuccess')->name('paypal.success');
            Route::get('/checkout-cancel', 'PaypalController@cancelPage')->name('paypal.cancel');
        });
    });
});



//Back-End
Route::group(['prefix' => 'admin'], function () {
    Route::match(['get','post'], '/', 'AdminController@index')->name('/admin');
    Route::match(['get','post'], '/dashboard', 'AdminController@dashboard')->middleware('auth');
    Route::match(['get','post'], '/logout', 'AdminController@logout')->middleware('auth');
    Route::namespace('Backend')->group(function () {

        //Router Administrator
        Route::group(['middleware' => ['role:Administrator']], function () {
            Route::group(['prefix' => 'user'], function() {
                Route::get('/', 'UserController@index')->name('user');
                Route::get('/edit-user/{id}', 'UserController@showEditUser')->where(['id' => '[0-9]+']);
                Route::post('/edit-user/{id}', 'UserController@EditUser')->where(['id' => '[0-9]+']);
                Route::delete('/del-user/{id}', 'UserController@DeleteUser')->where(['id' => '[0-9]+']);
                Route::post('/update-status', 'UserController@updateStatusUser');
            });

            Route::group(['prefix' => 'role'], function() {
                Route::get('/', 'UserController@index');
                Route::match(['get','post'], '/add-role', 'UserController@addRole')->name('addrole');
                Route::post('/edit-role-user', 'UserController@EditRole');
            });

            Route::delete('post/del-post/{id}', 'PostController@DeletePost')->where(['id' => '[0-9]+']);
            Route::delete('slides/del-slides/{id}', 'SlidesController@DeleteSlides')->where(['id' => '[0-9]+']);
            Route::delete('products/del-product/{id}', 'ProductController@DeleteProduct')->where(['id' => '[0-9]+']);
            Route::delete('cate/del-cate/{id}', 'CateController@DeleteCate')->where(['id' => '[0-9]+']);
            Route::delete('coupons/del-coupons/{id}', 'CouponsController@DeleteCoupons')->where(['id' => '[0-9]+']);
            Route::delete('bills/del-bill/{id}', 'BillController@delDetailOrders')->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'post'], function() {
            Route::get('/', 'PostController@index');
            Route::match(['get','post'], '/add-post', 'PostController@addPost');
            Route::get('/edit-post/{id}', 'PostController@showEditPost')->where(['id' => '[0-9]+']);
            Route::post('/edit-post/{id}', 'PostController@EditPost')->where(['id' => '[0-9]+']);
            Route::get('/view-comment/{id}', 'PostController@viewComment')->where(['id' => '[0-9]+']);
            Route::delete('/del-comment/{id}', 'PostController@delComment')->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'slides'], function() {
            Route::get('/', 'SlidesController@index');
            Route::match(['get','post'], '/add-slides', 'SlidesController@addSlides');
            Route::get('/edit-slides/{id}', 'SlidesController@showEditSlides')->where(['id' => '[0-9]+']);
            Route::post('/edit-slides/{id}', 'SlidesController@EditSlides')->where(['id' => '[0-9]+']);
            
        });

        Route::group(['prefix' => 'products'], function() {
            Route::get('/', 'ProductController@index');
            Route::match(['get','post'], '/add-product', 'ProductController@addProduct');
            Route::get('/edit-product/{id}', 'ProductController@showEditProduct')->where(['id' => '[0-9]+']);
            Route::post('/edit-product/{id}', 'ProductController@EditProduct')->where(['id' => '[0-9]+']);    
            Route::post('/update-status', 'ProductController@updateStatusProduct');
            Route::get('/view-comment/{id}', 'ProductController@viewComment')->where(['id' => '[0-9]+']);
            Route::delete('/del-comment/{id}', 'ProductController@delComment')->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'contacts'], function() {
            Route::get('/', 'ContactController@index');
            Route::get('/edit-contact/{id}', 'ContactController@showEditContact')->where(['id' => '[0-9]+']);
            Route::post('/edit-contact/{id}', 'ContactController@EditContact')->where(['id' => '[0-9]+']);
            Route::delete('/del-contact/{id}', 'ContactController@DeleteContact')->where(['id' => '[0-9]+']);

            Route::get('/email-ads', 'ContactController@emailAds')->name('emailads');
        });

        Route::group(['prefix' => 'cate'], function() {
            Route::get('/', 'CateController@index');
            Route::match(['get','post'], '/add-cate', 'CateController@addCate');
            Route::get('/edit-cate/{id}', 'CateController@showEditCate')->where(['id' => '[0-9]+']);
            Route::post('/edit-cate/{id}', 'CateController@EditCate')->where(['id' => '[0-9]+']);
            
        });

        Route::group(['prefix' => 'coupons'], function() {
            Route::get('/', 'CouponsController@index');
            Route::match(['get','post'], '/add-coupons', 'CouponsController@addCoupons');
            Route::get('/edit-coupons/{id}', 'CouponsController@showEditCoupons')->where(['id' => '[0-9]+']);
            Route::post('/edit-coupons/{id}', 'CouponsController@EditCoupons')->where(['id' => '[0-9]+']);
            Route::post('/update-status', 'CouponsController@updateStatusCoupons');
        });

        Route::group(['prefix' => 'bills'], function() {
            Route::get('/', 'BillController@index');
            Route::get('/view-details/{id}', 'BillController@viewDetailOrders')->where(['id' => '[0-9]+']);

            Route::post('/edit-order-status/{id}', 'BillController@changeStatusOrder')->where(['id' => '[0-9]+']);
        });

        Route::group(['prefix' => 'ui'], function() {
            Route::get('/banner-ads', 'HomeController@bannerAds')->name('bannerads');
        });

        Route::get('export', 'ExcelController@export')->name('admin.export');
    });
});


//Send mail Ads

Route::get('/get_users', 'MessageController@getUsers');
Route::get('/get_messages', 'MessageController@getMessages');
Route::post('/del_messages/{id}', 'MessageController@delMessages');
Route::post('/notifications', 'MessageController@sendMail');

//Change Language

Route::get('/language/{language}', 'LanguageController@index')->name('language');

});