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

Route::get('about', ['as'=>'about', 'uses'=>'HomeController@page_about']);
Route::get('contact', ['as'=>'contact', 'uses'=>'HomeController@page_contact']);
Route::get('login', ['as'=>'login', 'uses'=>'HomeController@page_login']);
Route::get('register', ['as'=>'register', 'uses'=>'HomeController@page_register']);
Route::get('admin/home', ['as'=>'home_ad', 'uses'=>'HomeController@page_product_ad']);

// Page
Route::get('/', 'ProductController@get_home_product_limit');
Route::get('home', ['as'=>'home', 'uses'=>'ProductController@get_home_product_limit']);
Route::get('product', ['as'=>'product', 'uses'=>'ProductController@get_pro_product_limit']);
Route::get('product-detail/{id}', ['as'=>'product-detail', 'uses'=>'ProductController@get_product_detail']);

// User
Route::post('register', ['as'=>'register-post', 'uses'=>'UserController@insert_user']);
Route::post('login', ['as'=>'login-post', 'uses'=>'UserController@login']);
Route::get('logout', ['as'=>'logout', 'uses'=>'UserController@logout']);

// Contact
Route::post('contact', ['as'=>'send-mail', 'uses'=>'ContactController@send_mail']);

// Cart
Route::get('cart/{id}', ['as'=>'add-cart', 'uses'=>'CartController@add_cart']);
Route::get('show-cart', ['as'=>'show-cart', 'uses'=>'CartController@show_cart']);
Route::get('increment/{id}', ['as'=>'increment', 'uses'=>'CartController@increment']);
Route::get('decrease/{id}', ['as'=>'decrease', 'uses'=>'CartController@decrease']);
Route::get('remove-cart', ['as'=>'remove-cart', 'uses'=>'CartController@remove_cart']);

// Admin producut
Route::get('admin/insert-product', ['as'=>'get-insert-product', 'uses'=>'ProductController@get_insert_product']);
Route::post('admin/insert-product', ['as'=>'insert-product', 'uses'=>'ProductController@insert_product']);
Route::get('admin/product', ['as'=>'product_ad', 'uses'=>'ProductController@get_product']);
Route::get('admin/product/{id}', ['as'=>'del-product', 'uses'=>'ProductController@del_product']);
Route::get('admin/edit-product/{id}', ['as'=>'get-edit-product', 'uses'=>'ProductController@edit_product']);
Route::post('admin/edit-product/{id}', ['as'=>'update-product', 'uses'=>'ProductController@upadte_product']);
