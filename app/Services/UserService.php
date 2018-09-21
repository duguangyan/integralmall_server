<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
use App\Models\Users;
use App\Services\BaseService;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Exception;
class UserService extends BaseService
{
    /**
     * 查找用户列表
     */
    public static function getUsers($page){
        try{
            if($page<=0){
                $page = 1;
            }
            $number = 10;
            $skip = ($page-1) * $number;
            $users = Users::where('userStatus','1')->skip($skip)->take($number)->orderBy('created_at', 'DESC')->get();
            $total = Users::where('userStatus','1')->count();
            $data = ['users'=>$users,'toital'=>$total];
            return self::JSON('200',$data,'成功');
        }catch ( Exception $e ) {
            return self::JSON('201','','参数错误');
        }

    }
    /**
     * @param $id 根据用户id查找用户
     */
    public static function getUserById($id){
//        echo asset('storage/file.txt');
        $user = Users::where('id', $id)->get();
        return self::JSON('200',$user,'成功');
    }

    /**
     * @param $req 用户模型
     * @return json数据
     */
    public static function addUser($req){
        $validator = Validator::make($req, array(
                'loginName' => 'required|min:3',
                'loginPwd' => 'required')
        );
        if ($validator->fails()) {
            $err = $validator->errors()->toArray();
            //dd($err);
            foreach ($err as $k => $v){
                return self::JSON('201','',$v[0]);
            }
        }

        $user = new Users();
        $hasUser = Users::all()->where('loginName',$req['loginName']);
        if(count($hasUser)>0){
            $data = '';
            return  self::JSON('201',$data,'用户名已存在');
        }
        $user['loginName'] = $req['loginName'];
        $user['loginPwd'] = bcrypt($req['loginPwd']);
        // dd($user);
        $res = $user->save();
        // dd($res);
        if($res){
            $data = $res;
            return self::JSON($data);
        }else{
            $data = $res;
            return self::JSON('201',$data,'失败');
        }
    }

    /**
     * @param $id根据用户id修改用户信息
     */
    public static function updateUser($id,$req){
        $validator = Validator::make($req, array(
                'loginName' => 'required|min:3',
                'loginPwd' => 'required')
        );
        if ($validator->fails()) {
            $err = $validator->errors()->toArray();
            //dd($err);
            foreach ($err as $k => $v){
                return self::JSON('201','',$v[0]);
            }
        }
        $user = [
            'loginName'=>$req['loginName'],
            'loginPwd' =>bcrypt($req['loginPwd'])
        ];
        $result = Users::where('id',$id)->update($user);
        if($result){
            return self::JSON('200','','成功');
        }else{
            return self::JSON('201','','失败');
        }
    }

    public static function deleteUser($id){
        //$result = Users::destroy(49);
        // print_r($result);
//        if($result){
//            return self::JSON('200','','成功');
//        }else{
//            return self::JSON('201','','失败');
//        }
        $user = [
            'userStatus'=>0
        ];
        $result = Users::where('id',$id)->update($user);
        if($result){
            return self::JSON('200','','成功');
        }else{
            return self::JSON('201','','失败');
        }
    }

}