<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
use App\Services\BaseService;
use App\Models\Users;
class DownloadService extends BaseService
{
    /**
     * @return 下载文件
     */
     public static function fileDownLoad(){
         $file = realpath(base_path('public/storage/files')).'\V2.5.xls';

         return response()->download($file, 'V2.5.xls');
     }
}