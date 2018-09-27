<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class BeforeUserLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token =  $request->header('token');
        $user = Users::all()->where('remember_token',$token)->toArray();
        if(!count($user)){
            $data = array('code' => 401,'data'=>'','msg' => "请先登录");
            return  Response()->json($data)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
        return $next($request);
    }
}
