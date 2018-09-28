<?php

namespace App\Controllers;


use App\Services\GoodsService;

class GoodsController extends Controller
{
    /**
     * @param int $page �ڼ�ҳ
     * @return $this    ������Ʒ�б���Ϣ
     */
    public function getGoods(){
        return GoodsService::getGoods(request()->all());
    }

    /**
     * ������Ʒid��ȡ��Ʒ��Ϣ
     * @param $id
     * @return mixed
     */
    public function getGoodById($id){
        return GoodsService::getGoodById(intval($id));
    }

    /**
     *  ������Ʒ
     *  @return ������ӳɹ���ʧ������
     */
    public function addGood(){
        $params = request()->all();
        return GoodsService::addGood($params);
    }

    /**
     * ������Ʒ
     * @param $id  goodId ��ƷID
     * @return mixed ���ظ��³ɹ���ʧ������
     */
    public function updateGood(){
        $params = request()->all();
        return GoodsService::updateGood($params);
    }

    /**
     * ����idɾ����Ʒ
     * @param $id
     * @return $this
     */
    public function deleteGood($id){
        return GoodsService::deleteGood($id);
    }


}