<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/21
 * Time: 13:39
 */

namespace App\Controllers;


use App\Services\MailService;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    /**
     * 发送邮件
     */
    public function sendMail()
    {
        Session::put('to','1322530161@qq.com');
        Session::put('title','重要邮件1');
        Session::put('content','这个是一封邮件1');
        MailService::sendRaw();
    }
}