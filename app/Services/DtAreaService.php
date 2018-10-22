<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
use App\Models\DtArea;
use App\Models\Goods;
use \Exception;
use Illuminate\Support\Facades\Validator;
class DtAreaService extends BaseService
{
    /**
     * @return mixed 获取省市区三级联动JSON
     */
    public static function getDtArea(){
        $pro = DtArea::where('area_parent_id',0)->get();
        for($i=0;$i< count($pro);$i++){
            //dd($pro[$i]->id);
           $city = DtArea::where('area_parent_id',$pro[$i]->id)->get();
           $pro[$i]['city'] = $city;
           for($j=0;$j<count($city);$j++){
               $area = DtArea::where('area_parent_id',$city[$j]->id)->get();
               $pro[$i]['city'][$j]['area'] = $area;

           }
        }
        return $pro;
    }
}