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
     return view('index');
})->name("index");

Auth::routes();

Route::middleware('auth')->group(function () {

     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

     Route::group([
          'prefix' => 'users',
     ], function () {
          Route::get('/', 'UsersController@index')
               ->name('users.user.index');
          Route::get('/create', 'UsersController@create')
               ->name('users.user.create');
          Route::get('/show/{user}', 'UsersController@show')
               ->name('users.user.show')->where('id', '[0-9]+');
          Route::get('/{user}/edit', 'UsersController@edit')
               ->name('users.user.edit')->where('id', '[0-9]+');
          Route::post('/', 'UsersController@store')
               ->name('users.user.store');
          Route::put('user/{user}', 'UsersController@update')
               ->name('users.user.update')->where('id', '[0-9]+');
          Route::delete('/user/{user}', 'UsersController@destroy')
               ->name('users.user.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'roles',
     ], function () {
          Route::get('/', 'RolesController@index')
               ->name('roles.role.index');
          Route::get('/create', 'RolesController@create')
               ->name('roles.role.create');
          Route::get('/show/{role}', 'RolesController@show')
               ->name('roles.role.show')->where('id', '[0-9]+');
          Route::get('/{role}/edit', 'RolesController@edit')
               ->name('roles.role.edit')->where('id', '[0-9]+');
          Route::post('/', 'RolesController@store')
               ->name('roles.role.store');
          Route::put('role/{role}', 'RolesController@update')
               ->name('roles.role.update')->where('id', '[0-9]+');
          Route::delete('/role/{role}', 'RolesController@destroy')
               ->name('roles.role.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'permissions',
     ], function () {
          Route::get('/', 'PermissionsController@index')
               ->name('permissions.permission.index');
          Route::get('/create', 'PermissionsController@create')
               ->name('permissions.permission.create');
          Route::get('/show/{permission}', 'PermissionsController@show')
               ->name('permissions.permission.show')->where('id', '[0-9]+');
          Route::get('/{permission}/edit', 'PermissionsController@edit')
               ->name('permissions.permission.edit')->where('id', '[0-9]+');
          Route::post('/', 'PermissionsController@store')
               ->name('permissions.permission.store');
          Route::put('permission/{permission}', 'PermissionsController@update')
               ->name('permissions.permission.update')->where('id', '[0-9]+');
          Route::delete('/permission/{permission}', 'PermissionsController@destroy')
               ->name('permissions.permission.destroy')->where('id', '[0-9]+');
     });
});

Route::group([
     'prefix' => 'role_has_permissions',
], function () {
     Route::get('/', 'RoleHasPermissionsController@index')
          ->name('role_has_permissions.role_has_permission.index');
     Route::get('/create', 'RoleHasPermissionsController@create')
          ->name('role_has_permissions.role_has_permission.create');
     Route::get('/show/{permission}/{role}', 'RoleHasPermissionsController@show')
          ->name('role_has_permissions.role_has_permission.show')->where('id', '[0-9]+');
     Route::get('/manage/{role}', 'RoleHasPermissionsController@manage')
          ->name('role_has_permissions.role_has_permission.manage')->where('id', '[0-9]+');
     Route::get('/{permission}/{role}/edit', 'RoleHasPermissionsController@edit')
          ->name('role_has_permissions.role_has_permission.edit')->where('id', '[0-9]+');
     Route::post('/', 'RoleHasPermissionsController@store')
          ->name('role_has_permissions.role_has_permission.store');
     Route::put('role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@update')
          ->name('role_has_permissions.role_has_permission.update')->where('id', '[0-9]+');
     Route::delete('/role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@destroy')
          ->name('role_has_permissions.role_has_permission.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'services',
], function () {
    Route::get('/', 'ServicesController@index')
         ->name('services.service.index');
    Route::get('/create','ServicesController@create')
         ->name('services.service.create');
    Route::get('/show/{service}','ServicesController@show')
         ->name('services.service.show')->where('id', '[0-9]+');
    Route::get('/{service}/edit','ServicesController@edit')
         ->name('services.service.edit')->where('id', '[0-9]+');
    Route::post('/', 'ServicesController@store')
         ->name('services.service.store');
    Route::put('service/{service}', 'ServicesController@update')
         ->name('services.service.update')->where('id', '[0-9]+');
    Route::delete('/service/{service}','ServicesController@destroy')
         ->name('services.service.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'reviews',
], function () {
    Route::get('/', 'ReviewsController@index')
         ->name('reviews.review.index');
    Route::get('/create','ReviewsController@create')
         ->name('reviews.review.create');
    Route::get('/show/{review}','ReviewsController@show')
         ->name('reviews.review.show')->where('id', '[0-9]+');
    Route::get('/{review}/edit','ReviewsController@edit')
         ->name('reviews.review.edit')->where('id', '[0-9]+');
    Route::post('/', 'ReviewsController@store')
         ->name('reviews.review.store');
    Route::put('review/{review}', 'ReviewsController@update')
         ->name('reviews.review.update')->where('id', '[0-9]+');
    Route::delete('/review/{review}','ReviewsController@destroy')
         ->name('reviews.review.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'enquiries',
], function () {
    Route::get('/', 'EnquiriesController@index')
         ->name('enquiries.enquiry.index');
    Route::get('/create','EnquiriesController@create')
         ->name('enquiries.enquiry.create');
    Route::get('/show/{enquiry}','EnquiriesController@show')
         ->name('enquiries.enquiry.show')->where('id', '[0-9]+');
    Route::get('/{enquiry}/edit','EnquiriesController@edit')
         ->name('enquiries.enquiry.edit')->where('id', '[0-9]+');
    Route::post('/', 'EnquiriesController@store')
         ->name('enquiries.enquiry.store');
    Route::put('enquiry/{enquiry}', 'EnquiriesController@update')
         ->name('enquiries.enquiry.update')->where('id', '[0-9]+');
    Route::delete('/enquiry/{enquiry}','EnquiriesController@destroy')
         ->name('enquiries.enquiry.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'messages',
], function () {
    Route::get('/', 'MessagesController@index')
         ->name('messages.message.index');
    Route::get('/create','MessagesController@create')
         ->name('messages.message.create');
    Route::get('/show/{message}','MessagesController@show')
         ->name('messages.message.show')->where('id', '[0-9]+');
    Route::get('/{message}/edit','MessagesController@edit')
         ->name('messages.message.edit')->where('id', '[0-9]+');
    Route::post('/', 'MessagesController@store')
         ->name('messages.message.store');
    Route::put('message/{message}', 'MessagesController@update')
         ->name('messages.message.update')->where('id', '[0-9]+');
    Route::delete('/message/{message}','MessagesController@destroy')
         ->name('messages.message.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'addresses',
], function () {
    Route::get('/', 'AddressesController@index')
         ->name('addresses.address.index');
    Route::get('/create','AddressesController@create')
         ->name('addresses.address.create');
    Route::get('/show/{address}','AddressesController@show')
         ->name('addresses.address.show')->where('id', '[0-9]+');
    Route::get('/{address}/edit','AddressesController@edit')
         ->name('addresses.address.edit')->where('id', '[0-9]+');
    Route::post('/', 'AddressesController@store')
         ->name('addresses.address.store');
    Route::put('address/{address}', 'AddressesController@update')
         ->name('addresses.address.update')->where('id', '[0-9]+');
    Route::delete('/address/{address}','AddressesController@destroy')
         ->name('addresses.address.destroy')->where('id', '[0-9]+');
});
