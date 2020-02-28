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
    return view('welcome');
})->name('welcome');

Route::resource('contacts', 'ContactController')->only('store');

//Traducción
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

//User
Route::resource('users', 'UserController')->middleware('verified');

 
//Email
Auth::routes(['verify' =>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//Admin
Route::get('/admin', 'AdminController@index')->middleware('auth', 'role:admin')->name('admin');
Route::get('/admin/users', 'AdminController@listUsers')->middleware('auth', 'role:admin')->name('listUsers');
Route::get('/admin/bannedusers', 'AdminController@bannedUsers')->middleware('auth', 'role:admin')->name('bannedUsers');
Route::get('/admin/usersadmins', 'AdminController@listUsersAdmins')->middleware('auth', 'role:admin')->name('listUsersAdmins');
Route::get('/admin/messages', 'AdminController@listMessages')->middleware('auth', 'role:admin')->name('listMessages');
Route::get('/admin/deviceson', 'AdminController@listDevicesOn')->middleware('auth', 'role:admin')->name('listDevicesOn');
Route::get('/admin/devicesoff', 'AdminController@listDevicesOff')->middleware('auth', 'role:admin')->name('listDevicesOff');
Route::get('/admin/create', 'AdminController@adminCreate')->middleware('auth', 'role:admin')->name('adminCreate');
Route::post('/admin', 'AdminController@adminStore')->middleware('auth', 'role:admin')->name('adminStore');
Route::get('/admin/restore/{id}', 'AdminController@restoreUser')->middleware('auth', 'role:admin')->name('/restore');
Route::get('/admin/ban/{id}', 'AdminController@banUser')->middleware('auth', 'role:admin')->name('/ban');
Route::get('/admin/delete/{id}', 'AdminController@destroyMessage')->middleware('auth', 'role:admin')->name('/deleteMessage');
Route::get('/admin/{id}/edit', 'AdminController@edit')->middleware('auth', 'role:admin')->name('userEdit');
Route::get('/admin/{id}/update', 'AdminController@update')->middleware('auth', 'role:admin')->name('userUpdate');
Route::get('/admin/{id}', 'AdminController@show')->middleware('auth', 'role:admin')->name('adminShow');
Route::get('/messages/{id}', 'AdminController@showMessage')->middleware('auth', 'role:admin')->name('messageShow');


//Devices
Route::get('/devices/create', 'DeviceController@create')->middleware('auth', 'verified');
Route::get('/devices/{id}', 'DeviceController@show')->middleware('auth', 'device:id', 'verified');
Route::resource('devices', 'DeviceController')->middleware('verified');
Route::get('/device/{id}', 'DeviceController@show')->middleware('auth', 'device:id', 'verified')->name('showDevice');
Route::get('/device/{id}/historical', 'DeviceController@historical')->middleware('auth', 'verified')->name('historical');

// Rutas Api


//Route::get('/device/{id}', 'ApiMeasurement@show');

//Shop
Route::get('/shop', function () {
    return view('shop');
})->name('shop');