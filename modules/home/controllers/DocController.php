<?php

namespace app\modules\home\controllers;
use app\modules\home\controllers\OverController;
use app\models\ShopDB;
use app\models\TypeDB;
use app\models\DocDB;

class DocController extends OverController
{
    public $enableCsrfValidation = false;
    public function init()
    {
        $aa = \Yii::$app->session->get('users');
        parent::init();
        if (!$aa){
            header('location:./index.php?r=home/index/login');
            exit();
        }
    }
    //确认购买 生成订单
    public function actionShop(){
        $r = \Yii::$app->request;
        if ($r->post('addrs') && $r->post('names') && $r->post('tels')){
            $mod = new DocDB();
            $rst = $mod->adddoc($r->post());
            if ($rst != null ){
                return $this->render('doc',['data'=>$rst]);
            }else{
                return $this->render('doc',['data'=>null]);
            }
        }else{
            return $this->render('doc',['data'=>null]);
        }

    }
    //批量确认购买 生成订单
    public function actionShops(){
        $mod = new DocDB();
        $r = \Yii::$app->request;
        if ($r->post('addrs') && $r->post('names') && $r->post('tels')){
            $data['addrs'] = $r->post('addrs');
            $data['names'] = $r->post('names');
            $data['tels'] = $r->post('tels');
            $data['user'] = '';
            $data['shuls'] = '';
            $data['money'] = 0;
            foreach ($r->post('user') as $item) {
                $data['user'] .= $item .',';
            }
            foreach ($r->post('shuls') as $item) {
                $data['shuls'] .= $item .',';
            }
            foreach ($r->post('money') as $item) {
                $data['money'] += $item;
            }
            $rst = $mod->adddoc($data);
            if ($rst != null ){
                return $this->render('doc',['data'=>$rst]);
            }else{
                return $this->render('doc',['data'=>null]);
            }
        }else{
            return $this->render('doc',['data'=>null]);
        }
    }
    //支付
    public function actionZhifu(){
        $mod = new DocDB();
        if ($mod->editdoc(\Yii::$app->request->post('data'))){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    //取消订单
    public function actionDeldoc(){
        $mod = new DocDB();
        $mod->deldoc(\Yii::$app->request->post('id'));
    }
    //收货
    public function actionShouhuo(){
        $mod = new DocDB();
        if ($mod->shouhuo(\Yii::$app->request->post('data'))){
            echo 'true';
        }else{
            echo 'false';
        }
    }

}
