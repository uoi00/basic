<?php
namespace app\modules\home\controllers;
use app\modules\home\controllers\OverController;
use app\models\ShopDB;
use app\models\TypeDB;
use app\models\ShopcarDB;
use app\models\DocDB;

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
//        exit();
    }

    //主页
    public function actionIndex(){
        return $this->render('index');
    }
    //个人信息
    public function actionInfo(){

    }
    //购物车
    public function actionShopcar(){
        $id = \Yii::$app->session->get('users')['id'];
        $sql = "select shop.img,shop.user,shop.price,shopcar.id,shopcar.shul,shopcar.sid
 from shop,shopcar where shopcar.uid=$id and shopcar.sid=shop.id;";
        $db = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $rst = $command->queryAll();
        if(\Yii::$app->request->isGet){ //确认数据上传方式是否为get
            /*处理数据*/
            $con = 0;
            foreach ($rst as $v){
                $con = $con + $v['shul']*$v['price'];
            }
            if ($con == \Yii::$app->request->get('pr')){  //校验数据的正确性
                $data['names'] = \Yii::$app->request->get('names');
                $data['addrs'] = \Yii::$app->request->get('addrs');
                $data['tels'] = \Yii::$app->request->get('tel');
                foreach ($rst as $v){
                    $data['user'] = $v['user'];
                    $data['shuls'] = $v['shul'];
                    $mod = new DocDB();
                    $mod->adddoc($data);  //生成订单
                }
            }
            exit();
        }
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

    }
}