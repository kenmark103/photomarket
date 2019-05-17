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

Route::get('/', function () {
    return view('front.welcome');
})->name('welcome');

Auth::routes();
Route::namespace('Front')->group(function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');

});
Route::group([ 'as' => 'front.' ], function (){
Route::namespace('Front')->group(function () {
Route::resource('blog', 'BlogController');
Route::resource('outdoor', 'OutdoorController');
Route::resource('wedding', 'WeddingController');
Route::resource('events', 'EventsController');
});});

Route::namespace('Auth')->group(function () {
Route::get('/logout', 'LoginController@userLogout')->name('user.logout');
});

Route::namespace('Admin')->group(function () {
    Route::get('admin', 'AdminController@showLoginForm');
    Route::post('admin', 'AdminController@login')->name('admin.login');
    Route::get('admin/logout', 'AdminController@adminLogout')->name('admin.logout');
    Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::post('admin/dashboard', 'DashboardController@store')->name('admin.dashboard.upload');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.' ], function ()
 {
    Route::namespace('Admin')->group(function () {//add admin routes
    Route::resource('categories', 'CategoriesController');
    Route::resource('products', 'ProductsController');
    Route::resource('customers', 'UsersController');
    Route::resource('employees', 'EmployeesController');
    Route::resource('events', 'EventsController');
    Route::resource('bookings', 'BookingsController');
    Route::resource('blogs', 'BlogController');

    });
});

Route::group(['prefix' => 'home', 'middleware' => 'auth', 'as' => 'home.' ], function ()
{
    Route::namespace('Front\account')->group(function () {//home routes
    //Route::resource('messages', 'msgController');
    Route::resource('events', 'eventController');
    Route::resource('booking', 'bookingController');
    Route::resource('images', 'imageController');
});
});
