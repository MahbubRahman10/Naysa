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


// Product
Route::get('/', 'ProductController@index');
Route::get('/products', 'ProductController@product');
Route::get('/products/{brand}', 'ProductController@brand');
Route::post('/products', 'ProductController@product');
Route::get('/product/{id}/{name}', 'ProductController@view');
Route::get('/categories/{id}/{name}', 'ProductController@categories');
Route::post('/product/review', 'ProductController@review');



// Search
Route::post('/search', 'SearchController@search');



// Contact
Route::get('/contact-us', 'ContactController@index');
Route::post('/contact', 'ContactController@create');

// About
Route::get('/about', 'AboutController@index');

// Gallery
Route::get('/gallery', 'GalleryController@index');

