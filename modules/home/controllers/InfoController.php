<?php
namespace app\modules\home\controllers;
use app\modules\home\controllers\OverController;
use app\models\ShopcarDB;
use app\models\DocDB;
use app\models\SpeakDB;

class InfoController extends OverController{

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

    //主页
    public function actionIndex(){
        $mod = new SpeakDB();
        $data = $mod->idsel(\Yii::$app->session->get('users')['id']);
        foreach ($data as $k=>$v){
            $data[$k]['cont'] = htmlspecialchars_decode($v['cont']);
        }
        return $this->render('index',['data'=>$data]);
    }
    //购物车
    public function actionShopcar(){
        $id = \Yii::$app->session->get('users')['id'];
        $sql = "select shop.img,shop.user,shop.price,shopcar.id,shopcar.shul,shopcar.sid
 from shop,shopcar where shopcar.uid=$id and shopcar.sid=shop.id;";
        $db = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $rst = $command->queryAll();
        return $this->render('shopcar',['data'=>$rst]);
    }
    //添加购物车
    public function actionAddcar(){
        $ss = \Yii::$app->request;
        $id = $ss->post('id');
        $shu = $ss->post('shu');
        $uid = \Yii::$app->session->get('users')['id'];
        $mod = new ShopcarDB();
        /*是否已经添加购物车*/
        if ($r = $mod->selid($id,$uid)){
            $da = $r->attributes;
            $r->id = $da['id'];
            $r->shul = $da['shul'] + $shu;
            $r->uid = $uid;
            $r->sid = $id;
            if ($r->save()){
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            $mod->shul = $shu;
            $mod->uid = $uid;
            $mod->sid = $id;
            if ($mod->save()){
                echo 'true';
            }else{
                echo 'false';
            }
        }

    }
    //取消购买
    public function actionDelcar(){
        $ss = \Yii::$app->request;
        $id = $ss->post('id');
        $mod = new ShopcarDB();
        $mod->delcar($id);
    }
    //订单
    public function actionDoc(){
        $mod = new DocDB();
        $rst = $mod->usel(\Yii::$app->session->get('users')['id'],\Yii::$app->request->get('type'));
        return $this->render('doclist' , ['data'=>$rst]);
    }
}