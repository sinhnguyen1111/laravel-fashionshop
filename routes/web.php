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

Auth::routes();
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


// Route::get('/login', 'HomeController@index')->name('home');
// Route::get('/','Auth\LoginController@showLoginForm')->name('show');
// Route::post('/logout','Auth\LoginController@logout')->name('logout');

Route::get('admin', function () {
    return view('backend.dashboard');
})->name('admin');
//Product//
Route::get('admin/product/index','Backend\ProductController@index')->name('backend.product.index');
Route::get('admin/product/create','Backend\ProductController@create')->name('backend.product.create');
Route::post('admin/product/store','Backend\ProductController@store')->name('backend.product.store');
Route::get('admin/product/{id}/delete','Backend\ProductController@destroy')->name('backend.product.delete');
Route::put('admin/product/{id}/update','Backend\ProductController@update')->name('backend.product.update');
Route::get('admin/product/{id}/edit','Backend\ProductController@edit')->name('backend.product.edit');



///Users

Route::get('admin/user/create','Backend\UserController@create')->name('backend.user.create');
Route::get('admin/user/index','Backend\UserController@index')->name('backend.user.index');
Route::post('admin/user/store','Backend\UserController@store')->name('backend.user.store');
Route::put('admin/user/{id}/update','Backend\UserController@update')->name('backend.user.update');
Route::get('admin/user/{id}/edit','Backend\UserController@edit')->name('backend.user.edit');

//Category
Route::get('admin/category/index','Backend\CategoryController@index')->name('backend.category.index');
Route::get('admin/category/create','Backend\CategoryController@create')->name('backend.category.create');
Route::post('admin/category/store','Backend\CategoryController@store')->name('backend.category.store');
Route::put('admin/category/update','Backend\CategoryController@update')->name('backend.category.update');
Route::get('admin/category/{id}/edit','Backend\CategoryController@edit')->name('backend.category.edit');



Route::get('/','Frontend\HomeController@index')->name('home.index');
Route::get('/about_us','Frontend\AboutController@index')->name('about.index');
// Route::get('/product','Frontend\ProductController@index')->name('product.index');
Route::get('/contact','Frontend\ContactController@index')->name('contact.index');

Route::get('user_info',[App\Http\Controllers\Backend\UserController::class,'test']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

