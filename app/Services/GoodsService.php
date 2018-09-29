<?php
/**
 * Created by PhpStorm.
 * User: duguangyan:15817390700
 * Date: 2018/9/19
 * Time: 16:32
 */

namespace App\Services;
use App\Models\Goods;
use \Exception;
use Illuminate\Support\Facades\Validator;
class GoodsService extends BaseService
{
    /**
     * 查找用户列表
     */
    public static function getGoods($params){
        $page = intval($params['page']);
        // dd($params);
        try{
            if($page<=0){
                $page = 1;
            }
            $number = 10;
            $skip = ($page-1) * $number;

            $goods = new Goods();
            if(isset($params['condition'])&&''!=$params['condition']){
                $goods = $goods->where('goodsName','like','%'.$params['condition'].'%');
            }
            $goods = $goods->where('isSale','1')
                ->where('goodsStatus',1)
                ->where('goodsFlag',1)
                ->skip($skip)->take($number)->orderBy('created_at', 'DESC')->get();

            $total = $goods->where('isSale','1')
                ->where('goodsStatus',1)
                ->where('goodsFlag',1)
                ->count();
            $data = ['goods'=>$goods,'toital'=>$total];
            return self::JSON(200,$data,'成功');
        }catch ( Exception $e ) {
            return self::JSON(201,'','参数错误');
        }

    }

    /**
     * @param $params
     * @return $this
     */
    public static function addGood($params){
        $validator = Validator::make($params, array(
                'goodsName' => 'required',
                'marketPrice' => 'required',
                'shopPrice' => 'required',
                'goodsStock' => 'required',
                'saleCount' => 'required',
                'goodsUnit' => 'required',
                'goodsCatId' => 'required',
                'isSale' => 'required',
                'goodsStatus' => 'required',
                'goodsFlag' => 'required',
                'commission' => 'required',
                'goodsImg' => 'required',
                'saleTime' => 'required',
                'goodsDesc' => 'required',
                )
        );
        if ($validator->fails()) {
            $err = $validator->errors()->toArray();
            //dd($err);
            foreach ($err as $k => $v){
                return self::JSON(201,'',$v[0]);
            }
        }
        $good = new Goods();
        $hasGood = Goods::all()->where('goodsName',$params['goodsName']);
        if(count($hasGood)>0){
            $data = '';
            return  self::JSON(201,$data,'商品已经存在');
        }

        $good['goodsName']   = $params['goodsName'];
        $good['marketPrice'] = $params['marketPrice'];
        $good['shopPrice']   = $params['shopPrice'];
        $good['goodsStock']  = $params['goodsStock'];
        $good['saleCount']   = $params['saleCount'];
        $good['goodsUnit']   = $params['goodsUnit'];
        $good['goodsCatId']  = $params['goodsCatId'];
        $good['isSale']      = $params['isSale'];
        $good['goodsStatus'] = $params['goodsStatus'];
        $good['goodsImg']    = $params['goodsImg'];
        $good['goodsFlag']   = $params['goodsFlag'];
        $good['commission']  = $params['commission'];
        $good['saleTime']  = $params['saleTime'];
        $good['goodsDesc']  = $params['goodsDesc'];

        $res = $good->save();

        if($res){
            return self::JSON($res);
        }else{
            $data = $res;
            return self::JSON(201,$data,'失败');
        }
    }

    /**
     * @param $id 商品id
     */
    public static function updateGood($params){
        $validator = Validator::make($params, array(
                'id' => 'required',
                'goodsName' => 'required',
                'marketPrice' => 'required',
                'shopPrice' => 'required',
                'goodsStock' => 'required',
                'saleCount' => 'required',
                'goodsUnit' => 'required',
                'goodsCatId' => 'required',
                'isSale' => 'required',
                'goodsStatus' => 'required',
                'goodsFlag' => 'required',
                'commission' => 'required',
                'goodsImg' => 'required',
                'saleTime' => 'required',
                'goodsDesc' => 'required',
            )
        );
        if ($validator->fails()) {
            $err = $validator->errors()->toArray();
            //dd($err);
            foreach ($err as $k => $v){
                return self::JSON(201,'',$v[0]);
            }
        }
        $good = [
            'goodsName'   => $params['goodsName'],
            'marketPrice' => $params['marketPrice'],
            'shopPrice'   => $params['shopPrice'],
            'goodsStock'  => $params['goodsStock'],
            'saleCount'   => $params['saleCount'],
            'goodsUnit'   => $params['goodsUnit'],
            'goodsCatId'  => $params['goodsCatId'],
            'isSale'      => $params['isSale'],
            'goodsStatus' => $params['goodsStatus'],
            'goodsImg'    => $params['goodsImg'],
            'goodsFlag'   => $params['goodsFlag'],
            'commission'  => $params['commission'],
            'saleTime'    => $params['saleTime'],
            'goodsDesc'   => $params['goodsDesc'],
        ];
        $result = Goods::where('id',$params['id'])->update($good);
        if($result){
            return self::JSON(200,'','成功');
        }else{
            return self::JSON(201,'','失败');
        }

    }

    /**
     * 根据商品id获取商品信息
     * @param $id
     * @return mixed
     */
    public static function getGoodById($id){
        $good =  Goods::where('id',$id)->get();
        if(count($good)){
            return self::JSON(200,$good,'根据id获取商品成功');
        }else{
            return self::JSON(201,'','根据id获取商品失败');
        }
    }


    /**
     * 根据id删除商品
     * @param $id
     * @return $this
     */
    public static function deleteGood($id){
        $good = [
            'goodsFlag'=>0
        ];
        $result = Goods::where('id',$id)->update($good);
        if($result){
            return self::JSON(200,'','成功');
        }else{
            return self::JSON(201,'','失败');
        }
    }

}