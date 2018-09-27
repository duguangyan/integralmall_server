<?php

namespace App\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @param $page 第几页
     * @return $this 返回用户列表信息
     */
    public function getUsers($page=1){
        return UserService::getUsers(intval($page));
    }

    /**
     * @param $id 根据用户id查找用户信息
     * @return $this 返回用户信息
     */
    public function getUserById($id){
        return UserService::getUserById($id);
    }

    /**
     * @return 添加用户
     */
    public function addUser(){
        return UserService::addUser(request()->all());
    }

    /**
     * @param $id根据用户id修改用户信息
     */
    public function updateUser($id){
        return UserService::updateUser($id,request()->all());
    }

    /**
     * @param $id 根据id删除用户
     */
    public function deleteUser($id){
        return UserService::deleteUser($id);
    }

    /**
     * 登录
     */
    public function userLogin(){
        return UserService::userLogin(request()->all());
    }

}