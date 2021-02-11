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
       Route::get('dashbaord', 'Admin\RiderController@index')->name('dashbaord');
       //Admin Profile
       Route::get('profile', 'Admin\ProfileController@index')->name('profile');

       Route::get('reports', 'Admin\ProfileController@reports')->name('reports');

       Route::get('edit-profile/{id}', 'Admin\ProfileController@edit');

       //To update the admin photo and shop/ company he/she owns 
       Route::post('update-shop_company_owner/{id}', 'Admin\ProfileController@update');

       //Get the riders
       Route::post('send-request/{id}','Admin\RequestController@sendRequest');

       Route::post('cancel-request/{id}', 'Admin\RequestController@cancel');

       Route::get('requests', 'Admin\RequestController@show')->name('requests');

       //Payment Route
      Route::post('send-payment/{id}','Admin\RequestController@payment');
});

Route::group(['middleware' => 'user'], function () {
       Route::get('/home', 'HomeController@index')->name('home');
       Route::get('user-report', 'HomeController@reports')->name('user-report');

       //To update the profile
       Route::get('edit-user/{id}', 'User\ProfileController@edit');

        Route::post('update-user/{id}', 'User\ProfileController@updateShop');
     

       //Profile Route

       Route::get('rider-profile', 'HomeController@profile')->name('rider-profile');

       Route::post('update-request/{id}', 'Admin\RequestController@updateUserOnDelete');

       Route::get('user-edit-profile/{id}', 'User\ProfileController@editUser');

       //Locations and Constituencies Routes
    
      


});