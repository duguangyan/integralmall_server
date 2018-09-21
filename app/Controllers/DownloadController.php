<?php

namespace App\Controllers;




use App\Services\DownloadService;

class DownloadController extends Controller
{
    /**
     * 上传图片
     */
    public function fileDownload(){
        return DownloadService::fileDownLoad();
    }


}
