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

// Auth::routes();
Route::get('/admin/login','AuthController@getLogin')->name('admin.login');
Route::post('/admin/login','AuthController@postLogin')->name('admin.login');

Route::get('/admin/register','AuthController@getRegister')->name('admin.register');
Route::post('/admin/register','AuthController@postRegister')->name('admin.register');
Route::get('/admin/logout','AuthController@logout')->name('admin.logout');

Route::get('/admin', 'HomeController@dashboard')->name('admin.dashboard')->middleware('auth');
Route::get('/admin/{any}', 'HomeController@dashboard')->where('any', '.*')->middleware('auth');

/* Người dùng */
Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/post/{id}', 'PostController@detailPost')->name('detail_post');

// Xóa comment
Route::get('/delete-comment/{id}', 'PostController@deleteComment')->name('delete_comment');
// Comment
Route::post('/comment', 'PostController@comment')->name('comment');


// Reply
Route::post('/reply', 'PostController@reply')->name('reply');
// Xóa reply
Route::get('/delete-reply/{id}', 'PostController@deleteReply')->name('delete_reply');
Route::resource('categories', 'CategoryIndexController');


/* api */
Route::group(['prefix' => 'api'], function() {
    //Post

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/','PostController@index');
        Route::get('/all','PostController@getAllPosts');
        Route::post('/add','PostController@addPost');
        Route::get('/edit/{id}','PostController@editPost');
        Route::put('/update/{id}','PostController@updatePost');
        Route::delete('/delete/{id}','PostController@deletePost');

        Route::get('/count','PostController@countPost');
    });


    //Category
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/','CategoryController@index');
        Route::get('/all','CategoryController@getAllCategories');
        Route::post('/add','CategoryController@addCategory');
        Route::get('/edit/{id}','CategoryController@editCategory');
        Route::put('/update/{id}','CategoryController@updateCategory');
        Route::delete('/delete/{id}','CategoryController@deleteCategory');
        Route::get('/allParent', 'CategoryController@allParent');
    });

    //Account Social
    Route::group(['prefix' => 'social_accounts'], function() {
        Route::get('/','SocialAccountController@index');
        Route::post('/add','SocialAccountController@addSocialAccount');
        Route::delete('/delete/{id}','SocialAccountController@deleteSocialAccount');
    });

    Route::get('/treeView','CategoryController@treeView');
    Route::post('/childrenCate', 'CategoryController@childrenCate');

    //User
    Route::get('/users', 'UserController@index');
    Route::get('/users/count','UserController@countUser');
    Route::get('/infoUser', 'UserController@getInfoUser');

    Route::post('/users/create', 'UserController@store');
    Route::get('/users/edit/{id}', 'UserController@edit');
    Route::put('/users/edit/{id}', 'UserController@update');

    Route::delete('/users/delete/{id}', 'UserController@deleteUser');
});
/* end api */

