<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/9/19
 * Time: 17:31
 */

namespace App\Services;


class BaseService
{
    // 返回数据json,中文转码
    public static function JSON($code=200,$data='',$msg='成功'){

        $data = ['code'=>$code,'data'=>$data,'msg'=>$msg];

        return response()->json($data)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}