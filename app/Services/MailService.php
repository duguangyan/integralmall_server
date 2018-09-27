<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
use App\Exceptions\ApiException;
use App\Services\BaseService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailService extends BaseService
{
    /**
     * @param string $title
     * @param $mail
     * @param string $content
     */
    public static function sendRaw(){

        $content = Session::get('content');
        Mail::raw($content,function ($msg){
            $to = Session::get('to');
            $title = Session::get('title');
            $msg->from('dis2010@126.com','duguangyan');
            $msg->subject($title);
            $msg->to($to);
        });

//        if(count(Mail::failures()) == 0){
//            return self::JSON('200','','发送成功');
//        }else{
//            throw new ApiException('邮件发送失败');
//            //self::JSON('201','','发送失败');
//        }

    }
}