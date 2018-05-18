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
Route::get('/', 'HomePageController@index')->name('homepage');

Route::get('/lien-he.html', function () {
    return view('lienhe');
})->name('lienhe');

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

Route::get('/my-blog.html', 'MyBlogPublicController@index')->name('myblog');

Route::get('my-blog/{topic}', 'MyBlogPublicController@showTopic')->name('blog.showTopic');
Route::get('my-blog/bai-viet/{slug}','MyBlogPublicController@showBaiViet')->name('blog.showBaiViet');

Route::get('/serie.html', 'MySeriePublicController@index')->name('serie-bv');
Route::get('serie/{topic}','MySeriePublicController@showTopic')->name('serie.showTopic');
Route::get('serie/bai-viet/{slug}','MySeriePublicController@showBaiViet')->name('serie.showBaiViet');

Route::get('/chuyen-de.html', 'MyChuyendePublicController@index')->name('chuyende');
Route::get('chuyen-de/{topic}','MyChuyendePublicController@showTopic')->name('chuyende.showTopic');
Route::get('chuyen-de/bai-viet/{slug}','MyChuyendePublicController@showBaiViet')->name('chuyende.showBaiViet');



Route::middleware('auth')->prefix('authorized')->group(function () {
    Route::get('lienhe/', 'LienHeController@index')->name('lienhe.index');
    Route::get('lienhe/{id}/dadoc','LienHeController@doclienhe')->name('lienhe.dadoc');
    Route::get('lienhe/{id}/delete','LienHeController@delete')->name('lienhe.delete');



    Route::get('dashboard',"DashboardController@index")->name('dashboard.index');
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

    Route::get('get-list-post/{type}/{id}','MyPostController@viewPostsOfTopic')->name('mypost.postsTopic');

    // Danh cho post
    Route::get('get-post-table/{typepost}/{ispublic}', 'MyPostController@getPostTable')->name('mypost.tablePost');

    Route::get('view-post/{type}/{id}','MyPostController@viewPost')->name('mypost.viewpost');
    Route::get('edit-post/{type}/{id}','MyPostController@editPost')->name('mypost.editpost');
    Route::get('write-post/{type}/{idTopic?}','MyPostController@writePost')->name('mypost.writepost');
    Route::get('delete-post/{type}/{id}','MyPostController@deletePost')->name('mypost.delete');


    Route::get('viewlist-blog','MyPostController@danhsachblog')->name('mypost.danhsachblog');
    Route::get('viewlist-serie','MyPostController@danhsachserie')->name('mypost.danhsachserie');
    Route::get('viewlist-chuyende','MyPostController@danhsachchuyende')->name('mypost.danhsachchuyende');

    Route::get('view-instance-post/{type}/{id}', 'MyPostController@viewInstancePost')->name('mypost.viewInstance');

    Route::post('save-post-new/{type}','MyPostController@savePost')->name('mypost.savepostnew');
    Route::put('save-post/{type}/{id}','MyPostController@updatePost')->name('mypost.updatePost');


    // route helper check for post

    Route::post('check-title-post/{type}','MyPostController@checkTitle')->name('mypost.checkTitle');
    Route::post('check-slug/{type}', 'MyPostController@checkSlug')->name('mypost.checkSlug');
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
    Route::get('topic/{id}/delete', 'TopicController@delete')->name('topic.delete');
    Route::get('topic/{filename}/image','TopicController@getImageTopic')->name('topic.getImage');


    Route::resource('file-management', 'FileManagementController');
    Route::get('file-management/{id}/delete','FileManagementController@delete')->name('file-management.delete');

    Route::get('getFileStoragePrivate/{id}', 'FileServiceController@show')->name('getFileStoragePrivate');
    Route::get('/admin', 'HomeController@index')->name('admin');
});
Auth::routes();

