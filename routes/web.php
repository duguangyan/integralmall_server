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

Route::get('/','\App\Controllers\UserController@getUsers');
Route::get('/getUsers/{page}','\App\Controllers\UserController@getUsers');
Route::get('/getUserById/{id}','\App\Controllers\UserController@getUserById');
Route::post('/addUser','\App\Controllers\UserController@addUser');
Route::post('/updateUser/{id}','\App\Controllers\UserController@updateUser');
Route::get('/deleteUser/{id}','\App\Controllers\UserController@deleteUser');

/**
 * 图片上传
 */
Route::post('/imgUpload','\App\Controllers\UploadController@imgUpload');