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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'posts\\PostsController@home');


Auth::routes();

Route::group([ 'middleware' => ['auth']], function (){

    Route::get('/posts/create', 'posts\\PostsController@create');
    Route::post('/posts', 'posts\\PostsController@store');
    Route::delete('/posts/{id}', 'posts\\PostsController@destroy');
    Route::get('/posts/{id}/edit', 'posts\\PostsController@edit');
    Route::patch('/posts/{id}', 'posts\\PostsController@update');

    Route::get('/comments/create', 'comment\\CommentsController@create');
    Route::post('/comments', 'comment\\CommentsController@store');
    Route::delete('/comments/{id}', 'comment\\CommentsController@destroy');
    Route::get('/comments/{id}/edit', 'comment\\CommentsController@edit');
    Route::patch('/comments/{id}', 'comment\\CommentsController@update');

    Route::get('/images/create', 'image\\ImagesController@create');
    Route::post('/images', 'image\\ImagesController@store');
    Route::delete('/images/{id}', 'image\\ImagesController@destroy');
    Route::get('/images/{id}/edit', 'image\\ImagesController@edit');
    Route::patch('/images/{id}', 'image\\ImagesController@update');

    Route::get('/user', 'Admin\UsersController@user_profile');
});


Route::group([ 'middleware' => ['auth', 'roles'], 'roles' => 'manager' ], function () {
    // Do admin stuff here


});

Route::group([ 'middleware' => ['auth', 'roles'], 'roles' => 'admin' ], function () {
    // Do admin stuff here
    Route::get('admin', 'Admin\AdminController@index');
    // Do nothing
//    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/pages', 'Admin\PagesController');
    Route::resource('admin/roles', 'Admin\RolesController');
    Route::resource('admin/permissions', 'Admin\PermissionsController');
    Route::resource('admin/settings', 'Admin\SettingsController');
    Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
});


//Route::resource('posts', 'posts\\PostsController');

//Route::resource('comments', 'comment\\CommentsController');
//Route::resource('images', 'image\\ImagesController');

Route::get('/posts', 'posts\\PostsController@index');
Route::get('/posts/{id}', 'posts\\PostsController@show');



Route::get('/comments', 'comment\\CommentsController@index');
Route::get('/comments/{id}', 'comment\\CommentsController@show');




Route::get('/images', 'image\\ImagesController@index');
Route::get('/images/{id}', 'image\\ImagesController@show');


