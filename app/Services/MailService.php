<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
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
    }
}