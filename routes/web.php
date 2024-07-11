<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth Route
Auth::routes();
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');
Route::get('register/email-confirm', function () {
    return view('emails.confirmmessage');
});
Route::get('/logout', 'Auth\LoginController@logout');

