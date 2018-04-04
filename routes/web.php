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
})->name('homepage');

Route::get('/lien-he', function () {
    return view('lienhe');
})->name('lienhe');

Route::get('/my-blog', function () {
    return view('myblog');
})->name('myblog');

Route::get('/serie-baiviet', function() {
    return view('serie');
})->name('serie-bv');

Route::get('/dich-vu', function () {
    return view('dichvu');
})->name('dichvu');

Route::get('/chuyen-de', function() {
    return view('chuyende');
})->name('chuyende');

Route::get('/gioi-thieu', function() {
    return view('gioithieu');
})->name('gioithieu');

Route::resource('items', 'ItemController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
