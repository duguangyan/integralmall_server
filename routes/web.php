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
 * 登录
 */
Route::post('/userLogin','\App\Controllers\UserController@userLogin');

Route::group(['middleware'=>['login']],function(){
    /**
     * 用户增删改查
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
    Route::post('/imgUpload/{id}','\App\Controllers\UploadController@imgUpload');
    /**
     * 文件下载
     */
    Route::get('/fileDownload','\App\Controllers\DownloadController@fileDownload');

    /**
     * 发送邮件
     */
    Route::get('/sendMail','\App\Controllers\MailController@sendMail');
});
