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
    public function actionShop(){
        var_dump(\Yii::$app->request->post());
        $mod = new DocDB();
        $rst = $mod->adddoc(\Yii::$app->request->post());
    }
}
