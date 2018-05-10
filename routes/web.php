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
Route::get('/404.html   ', function (){
    return view('layouts.admin.404');
})->name('404');
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/lien-he.html', function () {
    return view('lienhe');
})->name('lienhe');

Route::get('/my-blog.html', function () {
    return view('myblog');
})->name('myblog');

Route::get('/serie-baiviet.html', function() {
    return view('serie');
})->name('serie-bv');

Route::get('/dich-vu.html', function () {
    return view('dichvu');
})->name('dichvu');

Route::get('/chuyen-de.html', function() {
    return view('chuyende');
})->name('chuyende');

Route::get('/gioi-thieu.html', function() {
    return view('gioithieu');
})->name('gioithieu');
Route::get('/logout', function() {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::resource('items', 'ItemController');
Route::post('/dich-vu', 'ServiceContactController@store')->name('dichvu.store');
Route::get('getImagePublic/{filename}/{place}', 'ImagePublicController@showImage')->name('getImagePublic');

Route::post('lienhe/store','LienHeController@store')->name('lienhe.store');
//For bên front end dich vu lien he //

Route::middleware('auth')->prefix('authorized')->group(function () {
    Route::get('lienhe/', 'LienHeController@index')->name('lienhe.index');
    Route::get('lienhe/{id}/dadoc','LienHeController@doclienhe')->name('lienhe.dadoc');
    Route::get('lienhe/{id}/delete','LienHeController@delete')->name('lienhe.delete');



    Route::get('dashboard/{type?}',"DashboardController@index")->name('dashboard.index');
    // Danh sach dang viet do
    Route::get('get-un-blog','DashboardController@getMyUnPublishblog')->name('dashboard.getunblog');
    Route::get('get-un-serie','DashboardController@getMyUnPuhlishserie')->name('dashboard.getunserie');
    Route::get('get-un-chuyende','DashboardController@getMyUnPublishchuyende')->name('dashboard.getunchuyende');


    // danh sach da xuat ban
    Route::get('get-blog','DashboardController@getMyblog')->name('dashboard.getblog');
    Route::get('get-serie','DashboardController@getMySerie')->name('dashboard.getserie');
    Route::get('get-chuyende','DashboardController@getMyChuyende')->name('dashboard.getchuyende');
    //
    Route::get('get-topic-blog','DashboardController@gettopicblog')->name('dashboard.gettopicblog');
    Route::get('get-topic-serie','DashboardController@gettopicserie')->name('dashboard.gettopicserie');
    Route::get('get-topic-chuyende','DashboardController@gettopicchuyende')->name('dashboard.gettopicchuyende');

    Route::get('view-post/{id}','MyPostController@viewPost')->name('mypost.viewpost');
    Route::get('edit-post/{id}','MyPostController@editPost')->name('mypost.editpost');
    Route::get('delete-post/{id}','MyPostController@deletePost')->name('mypost.delete');

    Route::get('write-blog/{id}','MyPostController@writeblog')->name('mypost.writeblog');
    Route::get('write-serie/{id}','MyPostController@writeserie')->name('mypost.writeserie');
    Route::get('write-chuyende/{id}','MyPostController@writechuyende')->name('mypost.writechuyende');

    Route::post('save-blog','MyPostController@saveblog')->name('mypost.saveblog');
    Route::post('save-serie','MyPostController@saveserie')->name('mypost.saveserie');
    Route::post('save-chuyende','MyPostController@savechuyende')->name('mypost.savechuyende');



});

Route::prefix('authorized')->group(function() {

    Route::get('/get_dich_vu','ServiceContactController@index')->name('dichvu.index');
    Route::get('view_dich_vu/{id}','ServiceContactController@show')->name('dichvu.show');
    Route::get('mail_dich_vu/{id}','ServiceContactController@reply')->name('dichvu.reply');
    Route::post('mail_dich_vu/{id}','ServiceContactController@saveMail')->name('dichvu.saveMail');
    Route::get('delete_dich_vu/{id}','ServiceContactController@delete')->name('dichvu.delete');

    Route::resource('typepost','TypePostController');
    Route::get('typepost/{id}/delele', 'TypePostController@delete')->name('typepost.delete');

    Route::resource('tag', 'TagController');
    Route::get('tag/{id}/delele', 'TagController@delete')->name('tag.delete');

    Route::resource('topic', 'TopicController');
    Route::get('topic/{id}/delete', 'TopicController@delele')->name('topic.delete');
    Route::get('topic/{filename}/image','TopicController@getImageTopic')->name('topic.getImage');


    Route::resource('file-management', 'FileManagementController');
    Route::get('file-management/{id}/delete','FileManagementController@delete')->name('file-management.delete');

    Route::get('getFileStoragePrivate/{id}', 'FileServiceController@show')->name('getFileStoragePrivate');
    Route::get('/admin', 'HomeController@index')->name('admin');
});
Auth::routes();

