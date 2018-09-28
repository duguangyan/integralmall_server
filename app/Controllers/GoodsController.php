<?php

namespace App\Controllers;


use App\Services\GoodsService;

class GoodsController extends Controller
{
    /**
     * @param int $page 第几页
     * @return $this    返回商品列表信息
     */
    public function getGoods(){
        return GoodsService::getGoods(request()->all());
    }

    /**
     * 根据商品id获取商品信息
     * @param $id
     * @return mixed
     */
    public function getGoodById($id){
        return GoodsService::getGoodById(intval($id));
    }

    /**
     *  新增商品
     *  @return 返回添加成功或失败数据
     */
    public function addGood(){
        $params = request()->all();
        return GoodsService::addGood($params);
    }

    /**
     * 更新商品
     * @param $id  goodId 商品ID
     * @return mixed 返回更新成功或失败数据
     */
    public function updateGood(){
        $params = request()->all();
        return GoodsService::updateGood($params);
    }

    /**
     * 根据id删除商品
     * @param $id
     * @return $this
     */
    public function deleteGood($id){
        return GoodsService::deleteGood($id);
    }


}