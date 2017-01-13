<?php
namespace app\modules\home\controllers;

use app\modules\home\controllers\OverController;
use app\models\SpeakDB;

class SpeakController extends OverController{
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
    //用户留言
    public function actionLiuyan(){
        if (\Yii::$app->request->isPost){
            $mod = new SpeakDB();
            if ($mod->addspeak(\Yii::$app->request->post())){
                return $this->redirect(['index/index']);
            }
        }
        return $this->render('liuyan');
    }
}