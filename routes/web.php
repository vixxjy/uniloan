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

Route::get('/dashboard', ['uses'=> 'LoginController@index', 'as' => 'dashboard', 'middleware' => ['auth'] ]);

Route::get('/', ['uses' => 'LoginController@signin', 'as' => 'signin']);
Route::post('/signin', ['uses' => 'LoginController@postSignin', 'as' => 'user.signin']);
Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout', 'middleware' => ['auth']]);

// Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/create', 'UserController@create')->name('users.create');
    Route::post('/create', 'UserController@store')->name('users.store');
    Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/edit/{id}', 'UserController@update')->name('users.update');
    Route::get('/delete/{id}', 'UserController@destroy')->name('users.destroy');
    Route::get('/profile', 'UserController@profile')->name('users.profile');
});

Route::group(['prefix' => 'permissions', 'middleware' => ['auth']], function () {
    Route::get('/', 'PermissionController@index')->name('permissions.index');
    Route::get('/create', 'PermissionController@create')->name('permissions.create');
    Route::post('/create', 'PermissionController@store')->name('permissions.store');
    Route::get('/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
    Route::post('/edit/{id}', 'PermissionController@update')->name('permissions.update');
    Route::get('/delete/{id}', 'PermissionController@destroy')->name('permissions.destroy');
});

Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function () {
    Route::get('/', 'RoleController@index')->name('roles.index');
    Route::get('/create', 'RoleController@create')->name('roles.create');
    Route::post('/create', 'RoleController@store')->name('roles.store');
    Route::get('/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::post('/edit/{id}', 'RoleController@update')->name('roles.update');
    Route::get('/delete/{id}', 'RoleController@destroy')->name('roles.destroy');
});

Route::group(['prefix' => 'members', 'middleware' => ['auth']], function () {
    Route::get('/', 'MemberController@index')->name('members.index');
    Route::get('/create', 'MemberController@create')->name('members.create');
    Route::post('/create', 'MemberController@store')->name('members.store');
    Route::get('/show/{id}', 'MemberController@show')->name('members.show');
    Route::get('/edit/{id}', 'MemberController@edit')->name('members.edit');
    Route::post('/edit/{id}', 'MemberController@update')->name('members.update');
    Route::get('/delete/{id}', 'MemberController@destroy')->name('members.destroy');
    Route::post('/register/{id}', 'MemberController@approve')->name('members.register');
});

Route::group(['prefix' => 'products', 'middleware' => ['auth']], function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/create', 'ProductController@store')->name('products.store');
    Route::get('/show/{id}', 'ProductController@show')->name('products.show');
    Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('/edit/{id}', 'ProductController@update')->name('products.update');
    Route::get('/delete/{id}', 'ProductController@destroy')->name('products.destroy');
});


Route::group(['prefix' => 'loans', 'middleware' => ['auth']], function () {
    Route::get('/', 'LoanController@index')->name('loans.index');
    Route::get('/create', 'LoanController@create')->name('loans.create');
    Route::post('/create', 'LoanController@store')->name('loans.store');
    Route::get('/show/{id}', 'LoanController@show')->name('loans.show');
    Route::get('/edit/{id}', 'LoanController@edit')->name('loans.edit');
    Route::post('/edit/{id}', 'LoanController@update')->name('loans.update');
    Route::get('/delete/{id}', 'LoanController@destroy')->name('loans.destroy');
    Route::post('/register/{id}', 'LoanController@approve')->name('loans.register');
});
