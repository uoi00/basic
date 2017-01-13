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
        return $this->renderPartial('type.html');
    }
    public function actionDoc(){
        return $this->renderPartial('doc.html');
    }
    public function actionSpeak(){
        return $this->renderPartial('speak.html');
    }
    public function actionRoot(){
        return $this->renderPartial('root.html');
    }
}