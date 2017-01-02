<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\models\RootDB;
class RootController extends Controller{
    public $enableCsrfValidation = false;
    //查询管理列表
    public function actionRootlist(){
        $mod = new RootDB();
        $r = \Yii::$app->request;
        $r->post('rootname')?$d = $r->post('rootname'):$d = '';
        $mod->rootlist($r->post('list'),$r->post('page'),$d);
    }
    //添加管理员
    public function actionAddroot(){
        $mod = new RootDB();
        $mod ->addroot(\Yii::$app->request->post());
    }
    //修改用户(密码)
    public function actionEditroot(){
        $mod = new RootDB();
        $mod ->editroot(\Yii::$app->request->post());
    }
    //删除账号
    public function actionDelroot(){
        $mod = new RootDB();
        $s = \Yii::$app->request->post('ids');
        $mod ->delroot($s);
    }
}