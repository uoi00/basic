<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\models\SpeakDB;
class SpeakController extends Controller{
    public $enableCsrfValidation = false;
    //查询商品列表
    public function actionSpeaklist(){
        $mod = new speakDB();
        $r = \Yii::$app->request;
        $r->post('speakname')?$d = $r->post('speakname'):$d = '';
        $mod->speaklist($r->post('list'),$r->post('page'),$d);
    }
    //添加商品
    public function actionHuifuspeak(){
        $mod = new speakDB();
        $transaction = \Yii::$app->db->beginTransaction();  //开启事务处理
        $data = \Yii::$app->request->post();
        $data['user'] = '666666';
        if ($mod ->addspeak($data) && $mod->editspeak($data['id'])){
            $transaction->commit(); //新增 修改同时成功 执行操作
            echo json_encode(['fruit'=>'true','msg'=>'回复成功']);
        }else{
            $transaction->rollBack(); //新增或修改失败时 回滚操作
            echo json_encode(['fruit'=>'false','msg'=>'回复错误']);
        }
    }
}