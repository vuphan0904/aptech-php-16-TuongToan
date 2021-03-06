<?php
use App\Http\Middleware\checkUser;
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

Route::get('/', function () {
    return view('welcome');
});

//car
Route::get('cars/create', 'carsController@create')->name('cars.create');
Route::post('cars/store', 'carsController@store')->name('cars.store');
Route::get('cars/show/{id}', 'carsController@show')->name('cars.show');
Route::get('cars/index', 'carsController@index')->name('cars.index');
Route::get('cars/home', 'carsController@home')->name('cars.home');

//admin
Route::get('admin/index', 'adminController@index')->name('admin.index')->middleware('checkUser');
Route::get('admin/createCars', 'adminController@create')->name('admin.create')->middleware('checkUser');
Route::get('admin/show/{id}', 'adminController@show')->name('admin.show')->middleware('checkUser');
Route::get('admin/home', 'adminController@home')->name('admin.home')->middleware('checkUser');
Route::get('admin/edit/{id}', 'adminController@edit')->name('admin.edit')->middleware('checkUser');
Route::post('admin/cars/store', 'adminController@store')->name('admin.store');
Route::post('admin/update/{id}', 'adminController@update')->name('admin.update');
Route::delete('admin/delete/{id}', 'adminController@destroy')->name('admin.destroy');


//categories
Route::get('categories/create', 'categoriesController@create')->name('category.create');
Route::post('categories/store', 'categoriesController@store')->name('category.store');
Auth::routes();

//route to home page
Route::get('/home', 'HomeController@index')->name('home');

//auth
Route::get('auth/admin', 'authController@login')->name('auth.login');
Route::post('authentication', 'authController@authLogin')->name('auth');
Route::get('/auth/register', 'authController@create')->name('auth.create')->middleware('checkUser');
Route::post('/auth/store', 'authController@store')->name('auth.store');
Route::get('/auth/logout',  'authController@logout' )->name('auth.logout');
Route::get('/auth/index', 'authController@index')->name('auth.index');
Route::get('auth/show/{id}', 'authController@show')->name('auth.show');
Route::get('auth/edit/{id}', 'authController@edit')->name('auth.edit');
Route::post('auth/update/{id}', 'authController@update')->name('auth.update');
Route::delete('auth/delete/{id}', 'authController@destroy')->name('auth.destroy'); 

//search
//Route::get('/search', 'searchController')
Route::get('/car/{id}', 'searchController@show');
Route::get('/search/name', 'searchController@searchByName')->name('name.search');

//images product
Route::get('/images/product/{id}', 'imagesProductController@create')->name('images.create');

//order
Route::get('/order/{id}', 'orderController@create')->name('order.create');
Route::post('/order/store/', 'orderController@store')->name('order.store');