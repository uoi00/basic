<?php

namespace app\modules\home\controllers;

use yii\web\Controller;
use \Yii;

class OverController extends Controller
{
    public function init()
    {
        $session = Yii::$app->session;
        $session->get('users')? $a=$session->get('users')['user'] :$a = null; //判断用户是否登录
        $view = \Yii::$app->view;
        $view->params['user'] = $a;
    }
}
