<?php

use Illuminate\Support\Facades\Route;

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

Route::post('cart/add/{id}','Frontend\CartController@add')->name('cart.add');
Route::post('update/cart','Frontend\CartController@update')->name('update.cart');
Route::get('listcart','Frontend\CartController@index')->name('frontend.cart.index');
Route::get('detail_product','Frontend\CartController@show')->name('frontend.cart.show');
Route::get('cart/remove/{id}','Frontend\CartController@remove')->name('frontend.cart.remove');
Route::get('checkout','Frontend\CartController@checkout')->name('checkout');

Auth::routes();
// Route::get('admin','LoginController@showLoginForm')->name('admin.login');
// Route::post('admin','LoginController@login')->name('login');
Route::get('/home','HomeController@index')->name('home');

Route::get('/logout',function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
//
// Route::group([
//     'prefix'=>'admin',
//     'namespace'=>'Backend',
//     'middleware'=>['auth','auth_admin'],

// ]);

Route::get('admin','Backend\DashboardController@index')->name('backend.dashboard');

//Product//
Route::group([
    'prefix'=>'admin/product',
],function(){
    Route::get('index','Backend\ProductController@index')->name('backend.product.index');

    Route::get('create','Backend\ProductController@create')->name('backend.product.create');

    Route::post('store','Backend\ProductController@store')->name('backend.product.store');

    Route::delete('{id}/delete','Backend\ProductController@destroy')->name('backend.product.delete');           

    Route::put('{id}/update','Backend\ProductController@update')->name('backend.product.update');

    Route::get('/{id}/edit','Backend\ProductController@edit')->name('backend.product.edit');

    Route::get('detail_product/{id}','Frontend\ProductController@show')->name('frontend.product.show');
});




///Users
Route::group([
    'prefix'=>'admin/user',
],function(){
    Route::get('create','Backend\UserController@create')->name('backend.user.create');

    Route::get('index','Backend\UserController@index')->name('backend.user.index');

    Route::post('store','Backend\UserController@store')->name('backend.user.store');

    Route::put('{id}/update','Backend\UserController@update')->name('backend.user.update');

    Route::delete('/{id}/delete','Backend\UserController@destroy')->name('backend.user.delete');

    Route::get('{id}/edit','Backend\UserController@edit')->name('backend.user.edit');

    Route::get('user_info/{id}','Backend\UserController@info')->name('backend.userInfo');

});



//Category
Route::group([
    'prefix'=>'admin/category',
],function(){
    Route::get('index','Backend\CategoryController@index')->name('backend.category.index');
    Route::get('create','Backend\CategoryController@create')->name('backend.category.create');
    Route::post('store','Backend\CategoryController@store')->name('backend.category.store');
    Route::put('{id}/update','Backend\CategoryController@update')->name('backend.category.update');
    Route::get('{id}/edit','Backend\CategoryController@edit')->name('backend.category.edit');
    Route::get('{id}/delete','Backend\CategoryController@destroy')->name('backend.category.delete');
});



Route::get('/','Frontend\HomeController@index')->name('home.index');
Route::get('/about_us','Frontend\AboutController@index')->name('about.index');
Route::get('/detail_product','Frontend\ProductController@show')->name('product.show');
Route::get('/product_cate/{slug}/{id}','Frontend\CategoryController@index')->name('product.index');

Route::get('user_info',[App\Http\Controllers\Backend\UserController::class,'test']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

