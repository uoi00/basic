<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii;

class TestController extends Controller
{
    public $enableCsrfValidation = false;
    //后台登录界面
    public function actionIndex(){
        return $this->renderPartial('index.html');
    }
    //登录
    public function actionLogin(){
        $r =Yii::$app->request;
        $mod = new \app\models\RootDB();
        $rst = $mod::find()->select(['id','pwd','power','user'])->where('user=:user',[':user'=>$r->post('user')])->one(); //查询用户
        if(!$rst){
            echo 0;
        }
        else if(md5($r->post('pwd')) == $rst->attributes['pwd']){//核对密码
            $session = Yii::$app->session;
            $session->set('user',$rst->attributes);
            echo 1;
        }else{
            echo 0;
        }
    }
    //退出登录
    public function actionLogout(){
        $session = Yii::$app->session;
        $session->remove('user');
//        return $this->redirect('admin/test/index');
        return $this->redirect('./index.php?r=admin/test/index');
    }
}
