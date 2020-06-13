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

/**
* Retro Apps
*
* @package  Laravel Retro Apps
* @author   Ketut Ugi Diranta <nugi.dirta@gmail.com>
*/


Route::get('/',[
	'uses' => 'BlogController@index',
	'as' => 'blog',
]);

Route::get('/blog/{posts}',[
	'uses' => 'BlogController@show',
	'as' => 'blog.show',
]);

Route::get('/category/{category}',[
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

Route::get('/hello/{nama}',[
	'uses' => 'BlogController@hello',
	'as'	=> 'blog.hello',
]);

Route::get('/author/{author}',[
	'uses' => 'BlogController@author',
	'as' => 'author'
]);

Route::get('/blog-daftarisi',[
	'uses' => 'BlogController@daftarisi',
	'as' => 'blog.daftarisi',
]);

Route::get('/sitemap', 'SitemapController@index');
Route::get('/sitemap/posts', 'SitemapController@posts');
Route::get('/sitemap/categories', 'SitemapController@categories');

Route::get('/sub', function() {
    $user = \App\User::first();
    $user->notify(new \App\Notifications\Subscribe);
});

Auth::routes(['verify' => true]);

Route::get('/profile', 'Backend\ProfileController@index')->name('profile');

Route::group(['middleware' => ['role:admin|editor|author']], function() {
	Route::get('/home', 'Backend\HomeController@index')->name('home');
});

// Administrator & SuperAdministrator Control Panel Routes
Route::group(['middleware' => 'auth', 'middleware' => ['role:admin'], 'namespace' => 'Backend'], function () {
    Route::resource('/backend/users', 'UsersController', ['as'=>'backend']);
    Route::resource('/backend/permission', 'PermissionController', ['as'=>'backend']);
    Route::resource('/backend/roles', 'RolesController', ['as'=>'backend']);
});

Route::put('/backend/blog/restore/{blog}',[
	'uses' 	=> 'Backend\BlogController@restore',
	'as' 	=> 'backend.blog.restore',
]);

Route::delete('/backend/blog/force-destroy/{blog}',[
	'uses' 	=> 'Backend\BlogController@forceDestroy',
	'as' 	=> 'backend.blog.force-destroy',
]);

Route::resource('/backend/blog', 'Backend\BlogController',['as'=>'backend']);

Route::resource('/backend/category', 'Backend\CategoryController',['as'=>'backend']);

Route::get('/backend/users/confirm/{user}',[
	'uses' => 'Backend\UsersController@confirm',
	'as' => 'backend.users.confirm'
]);
Route::get('/backend/roles/confirm/{role}',[
	'uses' => 'Backend\RolesController@confirm',
	'as' => 'backend.roles.confirm'
]);

//Route::resource('/backend/user', 'Backend\UsersController',['as'=>'backend']);
