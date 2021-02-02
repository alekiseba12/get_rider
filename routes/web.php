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

Route::get('/', function () {

    return view('welcome');
});

Route::get('constituencies/get_by_constituency/{constituency_id}', 'LocationHandlerController@get_by_constituency')->name('constituencies');
Route::get('location/cordinates/{city}/{state}','LocationHandlerController@get_coordinates');

Auth::routes();

Route::post('login', 'Auth\LoginController@login')->name('login');


Route::group(['middleware' => 'admin'], function () {
       Route::get('admin', 'Admin\RiderController@index')->name('admin');
       Route::get('task-form', 'HomeController@form')->name('task-form');
       Route::post('submit-task', 'HomeController@storeTask')->name('submit-task');


       Route::get('profile', 'Admin\ProfileController@index')->name('profile');

       Route::get('reports', 'Admin\ProfileController@reports')->name('reports');

       //To update the admin profile
       Route::post('update-shop_company_owner/{id}', 'Admin\ProfileController@update');

       //Get the riders

       Route::get('profile', 'Admin\ProfileController@index')->name('profile');

       //Delivery routes 

       Route::post('product-delivery/{id}', 'Admin\DeliveryController@store');

       Route::get('all-riders-deliveries', 'Admin\DeliveryController@show')->name('all-riders-deliveries');

       //Request the rider to deliver the cargo

       Route::post('send-request/{id}','Admin\RequestController@sendRequest');

       Route::get('all-riders-requests', 'Admin\RequestController@show')->name('all-riders-requests');
});

Route::group(['middleware' => 'user'], function () {
       Route::get('/home', 'HomeController@index')->name('home');
       Route::get('user-report', 'HomeController@reports')->name('user-report');

       //To update the profile
       Route::get('edit-user/{id}', 'User\ProfileController@edit');
       Route::post('update-user/{id}', 'User\ProfileController@updateShop');
       //delivery routes

       Route::get('available-deliveries', 'Admin\DeliveryController@showAvalaibleDeliveries')->name('available-deliveries');

       //Request Buyer/Seller

       Route::post('request-delivery/{id}','User\IndexController@requestDelivery');

       //Profile Route

       Route::get('rider-profile', 'HomeController@profile')->name('rider-profile');
      


});