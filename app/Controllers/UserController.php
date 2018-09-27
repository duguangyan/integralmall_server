<?php

namespace App\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @param $page �ڼ�ҳ
     * @return $this �����û��б���Ϣ
     */
    public function getUsers($page=1){
        return UserService::getUsers(intval($page));
    }

    /**
     * @param $id �����û�id�����û���Ϣ
     * @return $this �����û���Ϣ
     */
    public function getUserById($id){
        return UserService::getUserById($id);
    }

    /**
     * @return ����û�
     */
    public function addUser(){
        return UserService::addUser(request()->all());
    }

    /**
     * @param $id�����û�id�޸��û���Ϣ
     */
    public function updateUser($id){
        return UserService::updateUser($id,request()->all());
    }

    /**
     * @param $id ����idɾ���û�
     */
    public function deleteUser($id){
        return UserService::deleteUser($id);
    }

    /**
     * ��¼
     */
    public function userLogin(){
        return UserService::userLogin(request()->all());
    }

}