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
        $mod = new DocDB();
        $rst = $mod->adddoc(\Yii::$app->request->post());
        if ($rst != null ){
            return $this->render('doc',['data'=>$rst]);
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
}
