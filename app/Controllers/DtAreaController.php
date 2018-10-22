<?php

namespace App\Controllers;

use App\Services\DtAreaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DtAreaController extends Controller
{
    /**
     * @return mixed 获取省市区三级联动JSON
     */
    public function getDtArea(){
        return DtAreaService::getDtArea();
    }

    /**
     * 获取外部http
     */
    public function getGuzzlehttp(){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'http://integralmall_server.dev/getUsers?page=1');
        if($res->getStatusCode()==200){
            return $res->getBody();
        }else{
            return $this->JSON('201','','请求失败');
        }

        //echo $res->getStatusCode();
// 200
        //echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        //echo $res->getBody();
// '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.
//        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//        $promise = $client->sendAsync($request)->then(function ($response) {
//            echo 'I completed! ' . $response->getBody();
//        });
//        $promise->wait();
    }
}
