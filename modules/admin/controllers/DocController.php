<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\models\DocDB;
class DocController extends Controller{
    public $enableCsrfValidation = false;
    //查询管理列表
    public function actionDoclist(){
        $mod = new DocDB();
        $r = \Yii::$app->request;
        $r->post('docname')?$d = $r->post('docname'):$d = '';
        $mod->doclist($r->post('list'),$r->post('page'),$d);
    }
    //删除账号
    public function actionDeldoc(){
        $mod = new docDB();
        $s = \Yii::$app->request->post('ids');
        $mod ->deldoc($s);
    }
}