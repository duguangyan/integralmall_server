<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/21
 * Time: 13:39
 */

namespace App\Controllers;


use App\Exceptions\ApiException;
use App\Services\MailService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class MailController extends Controller
{
    /**
     * 发送邮件
     */
    public function sendMail()
    {
        $string_random =  str_random(8);
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'to' => 'required|email',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return $this->JSON(208,$validator->errors()->first(),'参数错误');
        }
        Session::put('to',(request()->all())['to']);
        Session::put('title',(request()->all())['title']);
        Session::put('content',(request()->all())['content']);
        try{
            return MailService::sendRaw();
        }catch (ApiException $e){
            return $this->JSON('201',$e->getMessage(),'发送失败');
        }

    }
}