<?php

namespace app\modules\home\controllers;

use yii\web\Controller;
use \Yii;

class IndexController extends Controller
{
//    public $layout = 'dzf'; //布局页面
    public function actionIndex()
    {
        if (Yii::$app->session->get('username')){

        }
        $username = null;
        $view = \Yii::$app->view;
        $view->params['user'] = $username; //传递数据到布局页面
        return $this->render('index');
    }
}
