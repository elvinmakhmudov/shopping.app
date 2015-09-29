<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('about', [
    'as' => 'about', 'uses'=>'PagesController@about'
]);

Route::get('home', 'HomeController@index');
Route::get('admin', [
    'as' => 'admin_path', 'uses' => 'AdminController@index'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('users', 'UsersController');
Route::resource('users.orders', 'OrdersController');

Route::resource('category', 'CategoriesController');
Route::resource('category.products', 'ProductsController');
Route::resource('category.products.pictures', 'PicturesController');

//Event::listen('illuminate.query', function($sql) {
//    var_dump($sql);
//});

