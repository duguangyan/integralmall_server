<?php

namespace App\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * @param $page �ڼ�ҳ
     * @return $this �����û��б���Ϣ
     */
    public function getUsers(){

        $rules = [
            'page' => 'required|integer',
        ];

        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            $err = $validator->errors()->messages()['page'][0];
            return $this->JSON(208,'',$err);
        }

        return UserService::getUsers(request()->all());
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

        $user['loginName'] = str_random(10);
        $user['loginPwd'] = Hash::make(123456);
        $user['remember_token'] = str_random(50);
        $res = Users::create($user);
        // dd($this->JSON(200,'',''));

        
        if(count($res)>0){
            return $this->JSON(200,'','成功');
        }else{
            return $this->JSON(200,'','失败');
        }
        //return UserService::addUser(request()->all());
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