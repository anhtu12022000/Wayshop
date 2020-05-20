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
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Route::get('quyen', function() {
    Role::create(['name' => 'Administrator']);
    Auth::user()->assignRole('Administrator');
});


Auth::routes();
// Front-End
Route::match(['get','post'], '/', 'IndexController@index');
// Route::match(['get','post'], 'shop', 'IndexController@shop');
Route::match(['get','post'], '/aboutus', 'IndexController@aboutus');
Route::match(['get','post'], '/cart', 'IndexController@cart');
Route::match(['get','post'], '/checkout', 'IndexController@checkout');
Route::match(['get','post'], '/shop-detail', 'IndexController@detail');
Route::match(['get','post'], '/my-account', 'IndexController@account');
Route::match(['get','post'], '/wishlist', 'IndexController@wishlist');
Route::match(['get','post'], '/service', 'IndexController@service');
Route::match(['get','post'], '/contact-us', 'IndexController@contact');
Route::match(['get','post'], '/shop', 'IndexController@shop');
Route::get('product-detail/{id}', 'IndexController@productDetail');
Route::get('post-detail/{slug}', 'IndexController@postDetail');



Route::get('search/{keyword}', 'IndexController@search');

Route::match(['get','post'], '/contact', 'IndexController@contact');


Route::namespace('Frontend')->group(function () {
    Route::group(['prefix' => 'user'], function() {
        Route::post('/register', 'AccountController@register');
        Route::post('/login', 'AccountController@login');
        Route::post('/change-password/{id}', 'AccountController@changePassword');
        Route::post('/change-information/{id}', 'AccountController@changeInformation');
        Route::get('/logout', 'AccountController@logout');
    });
});

Route::get('/404','IndexController@notFound')->name('404');

//Back-End

Route::group(['prefix' => 'admin'], function () {
    Route::match(['get','post'], '/', 'AdminController@index')->name('/admin');
    Route::match(['get','post'], '/dashboard', 'AdminController@dashboard')->middleware('auth');
    Route::match(['get','post'], '/logout', 'AdminController@logout');
    Route::namespace('Backend')->group(function () {

        Route::group(['prefix' => 'user'], function() {
            Route::get('/', 'UserController@index');
            Route::get('/edit-user/{id}', 'UserController@showEditUser');
            Route::post('/edit-user/{id}', 'UserController@EditUser');
            Route::delete('/del-user/{id}', 'UserController@DeleteUser');
        });

        Route::group(['prefix' => 'post'], function() {
            Route::get('/', 'PostController@index');
            Route::match(['get','post'], '/add-post', 'PostController@addPost');
            Route::get('/edit-post/{id}', 'PostController@showEditPost');
            Route::post('/edit-post/{id}', 'PostController@EditPost');
            Route::delete('/del-post/{id}', 'PostController@DeletePost');
        });

        Route::group(['prefix' => 'slides'], function() {
            Route::get('/', 'SlidesController@index');
            Route::match(['get','post'], '/add-slides', 'SlidesController@addSlides');
            Route::get('/edit-slides/{id}', 'SlidesController@showEditSlides');
            Route::post('/edit-slides/{id}', 'SlidesController@EditSlides');
            Route::delete('/del-slides/{id}', 'SlidesController@DeleteSlides');
        });

        Route::group(['prefix' => 'products'], function() {
            Route::get('/', 'ProductController@index');
            Route::match(['get','post'], '/add-product', 'ProductController@addProduct');
            Route::get('/edit-product/{id}', 'ProductController@showEditProduct');
            Route::post('/edit-product/{id}', 'ProductController@EditProduct');
            Route::delete('/del-product/{id}', 'ProductController@DeleteProduct');
        });

        Route::group(['prefix' => 'bills'], function() {
            Route::get('/', 'BillController@index');
            Route::get('/edit-product/{id}', 'BillController@showEditProduct');
            Route::post('/edit-product/{id}', 'BillController@EditProduct');
            Route::delete('/del-product/{id}', 'BillController@DeleteProduct');
        });

        Route::group(['prefix' => 'contacts'], function() {
            Route::get('/', 'ContactController@index');
            Route::get('/edit-product/{id}', 'ContactController@showEditProduct');
            Route::post('/edit-product/{id}', 'ContactController@EditProduct');
            Route::delete('/del-product/{id}', 'ContactController@DeleteProduct');
        });

        Route::group(['prefix' => 'cate'], function() {
            Route::get('/', 'CateController@index');
            Route::match(['get','post'], '/add-cate', 'CateController@addCate');
            Route::get('/edit-cate/{id}', 'CateController@showEditCate');
            Route::post('/edit-cate/{id}', 'CateController@EditCate');
            Route::delete('/del-cate/{id}', 'CateController@DeleteCate');
        });
    });
});



