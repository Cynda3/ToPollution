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

Route::resource('users', 'UserController')->only(['store', 'show', 'edit', 'update', 'destroy']);

 
//Email
Auth::routes(['verify' =>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


