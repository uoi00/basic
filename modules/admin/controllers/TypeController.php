<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\models\TypeDB;
class TypeController extends Controller{
    public $enableCsrfValidation = false;
    //查询商品列表
    public function actionTypelist(){
        $mod = new typeDB();
        $r = \Yii::$app->request;
        $mod->typelist($r->post('list'),$r->post('page'));
    }
    //添加商品
    public function actionAddtype(){
        $mod = new typeDB();
        $mod ->addtype(\Yii::$app->request->post());
    }
    //修改
    public function actionEdittype(){
        $mod = new typeDB();
        $mod ->edittype(\Yii::$app->request->post());
    }
    //删除
    public function actionDeltype(){
        $mod = new typeDB();
        $s = \Yii::$app->request->post('ids');
        $mod ->deltype($s);
    }
    //获取分类
    public function actionTypeprt(){
        $mod = new TypeDB();
        $data = $mod->getsel('0');
        echo json_encode($data);
    }
}