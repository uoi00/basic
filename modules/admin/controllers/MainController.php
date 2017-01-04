<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\OverController;

class MainController extends OverController{
    public function actionMain(){
        return $this->renderPartial('index',['user'=>$this->user]);
    }
    public function actionShop(){
        return $this->renderPartial('shop.html');
    }
    public function actionType(){
        echo 'type';
    }
    public function actionDoc(){
        echo 'doc';
    }
    public function actionSpeak(){
        echo 'speak';
    }
    public function actionUser(){
        return $this->renderPartial('user.html');
    }
    public function actionRoot(){
        return $this->renderPartial('user.html');
    }
}