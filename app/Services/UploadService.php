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
class UploadService extends BaseService
{
    /**
     * @param $file
     * @param $id
     * @return $this
     */
    public static function imgUpload($file, $id){

        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            //return ['error' => 'You may only upload png, jpg or gif.'];
            return self::JSON('201','','请上传png、jpg、gif类型的文件');
        }
        $destinationPath = 'public/storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
        $user = [
            'headImg'=>$filePath
        ];
        $info= Users::where('id',$id)->update($user);
        if($info){
            return self::JSON('200',$filePath,'上传成功');
        }else{
            return self::JSON('201','','上传失败');
        }
    }
}