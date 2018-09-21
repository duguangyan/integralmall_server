<?php

namespace App\Controllers;

use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * 上传图片
     */
    public function imgUpload($id){
        return UploadService::imgUpload(request()->file('file'),intval($id));
    }


}
