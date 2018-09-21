<?php

namespace App\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param int $code
     * @param string $data
     * @param string $msg
     * @return $this 返回数据json,中文转码
     */
    public function JSON($code=200,$data='',$msg='成功'){
        $data = ['code'=>$code,'data'=>$data,'msg'=>$msg];
        return response()->json($data)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }



}
