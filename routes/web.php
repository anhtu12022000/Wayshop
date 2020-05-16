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

// Route::get('/', function () {
//     return view('welcome');
// });
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Route::get('/', function() {
	$role = Role::find(1);
	// $permission = Permission::create(['name' => 'add category']);
	// $role->givePermissionTo($permission);
	$user = Auth::user();

	// get a list of all permissions directly assigned to the user
	$permissionNames = $user->getPermissionNames(); // collection of name strings
	$permissions = $user->permissions; // collection of permission objects
	dd($permissionNames);
});

Auth::routes();

// // Front-End
// Route::match(['get','post'], '/', 'IndexController@index');
// // Route::match(['get','post'], 'shop', 'IndexController@shop');
// Route::match(['get','post'], '/aboutus', 'IndexController@aboutus');
// Route::match(['get','post'], '/cart', 'IndexController@cart');
// Route::match(['get','post'], '/checkout', 'IndexController@checkout');
// Route::match(['get','post'], '/product-detail', 'IndexController@detail');
// Route::match(['get','post'], '/my-account', 'IndexController@account');
// Route::match(['get','post'], '/wishlist', 'IndexController@wishlist');
// Route::match(['get','post'], '/shop', 'IndexController@shop');
// Route::match(['get','post'], '/contact-us', 'IndexController@contact');


//Back-End
Route::match(['get','post'], '/admin', 'AdminController@index');
Route::match(['get','post'], '/admin/dashboard', 'AdminController@dashboard');

