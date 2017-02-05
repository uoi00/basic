<?php

namespace app\modules\home\controllers;
use app\models\ShopcarDB;
use app\models\UserDB;
use app\modules\home\controllers\OverController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\ShopDB;
use app\models\TypeDB;
use app\models\DocDB;

class IndexController extends OverController
{
    public $enableCsrfValidation = false;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }
    //验证码及其他配置
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 4, //生成验证码最大个数
                'minLength' => 4, //生成验证码最小个数
                'width' => 80, //验证码的宽度
                'height' => 40, //验证码的高度
            ],
        ];
    }
    //登录检测
    public function login(){
        $aa = \Yii::$app->session->get('users');
        if (!$aa){
            header('location:./index.php?r=home/index/login');
            exit();
        }
    }
    //主页商品列表
    public function actionIndex()
    {
        /*查询最新上架的八件商品*/
        $mod = new ShopDB();
        $rst = $mod::find()->limit(8)->orderBy('time desc')->all();
        /*将数据对象转化成字符串*/
        foreach ($rst as $k=>$v){
            $rst[$k] = $v->attributes;
        }
        $mod = new TypeDB();
        $type = $mod->getsel('1');
        $color = $mod->getsel('28');
        $yotu = $mod->getsel('2');
        $baoz = $mod->getsel('3');
        return $this->render('index',['rst'=>$rst,'type'=>$type,'color'=>$color,'yotu'=>$yotu,'baoz'=>$baoz]);
    }
    //登录
    public function actionLogin(){
        $this->layout = 'dzf';
        $model = new \app\models\Login();
        $requesr = \Yii::$app->request;
        if ($requesr->isPost && $model->load($requesr->post()) && $model->validate()){
            $User = new \app\models\UserDB();
            $username = $model['user'];
            $pwd = md5($model['password']);
            $m_pwd = $User::find()->select(['id','user','pwd'])->where('user=:user',[':user'=>$username])->one();
            if ( $m_pwd->attributes['pwd'] == $pwd ) {
                $session = \Yii::$app->session;
                $session->set('users' , $m_pwd->attributes);
                return $this->redirect('./index.php?r=home/index/index');
            }else{
                return $this->redirect(\yii\helpers\Url::to(['login']));
            }
        }
        return $this->render('login' , ['model'=>$model]);
    }
    //注册
    public function actionRegister(){
        $this->layout = 'dzf';
        $model = new \app\models\Register();
        $requesr = \Yii::$app->request;
        if ($requesr->isPost && $model->load($requesr->post()) && $model->validate()){
            $User = new \app\models\UserDB();
            $User->user = $model['user'];
            $User->pwd = md5($model['password']);
            $User->time = date('Y-m-d H:i:s');
            if ($User->save()){
                $this->redirect(\yii\helpers\Url::to(['login']));
            }else{
                $this->redirect(\yii\helpers\Url::to(['register']));
            }
        }
        return $this->render('register' , ['model'=>$model]);
    }
    //找回密码
    public function actionFind(){
        $this->layout = 'dzf';
        $model = new \app\models\Find();
        $requesr = \Yii::$app->request;
        if ($requesr->isPost && $model->load($requesr->post()) && $model->validate()){
            $User = new \app\models\UserDB();
            $rst = $User::find()->select('id')->where('user=:user',[':user'=>$model['user']])->one();
            $rst->pwd = md5($model['password']);
            if ($rst->save()){
                $this->redirect(\yii\helpers\Url::to(['login']));
            }else{
                $this->redirect(\yii\helpers\Url::to(['find']));
            }
        }
        return $this->render('find' , ['model'=>$model]);
    }
    //发送邮件
    public function actionMail(){
        $mail = \Yii::$app->request->post('mail');
        $mod = new UserDB();
        if ($mod->getId($mail)){ //判断是否为注册用户
            $yz = rand(100000,999999); //随机验证码
            $m = \Yii::$app->mailer->compose();
            $m->setTo($mail);
            $m->setSubject("邮件测试");
            //$mail->setTextBody('zheshisha ');   //发布纯文字文本
            $m->setHtmlBody("【美丽花店】验证码$yz,您正在找回美丽花店账号的密码，如非本人操作请忽略。");    //发布可以带html标签的文本
            if($m->send()) {
                \Yii::$app->session->set('mks', $yz);
                exit("true");
            } else {
                exit("false");
            }
        }else{
            exit('have');
        }
    }
    //退出
    public function actionTuichu(){
        \Yii::$app->session->set('users',null);
        return $this->redirect('./index.php?r=home/index/index');
    }
    //商品详情
    public function actionShops(){
        $id = \Yii::$app->request->get('ids');
        $mod = new ShopDB();
        $rst = $mod::findOne($id);
        return $this->render('shops',['rst'=>$rst]);
    }
    //在购物车购买
    public function actionCarshop(){
        $r = \Yii::$app->request;
        $shopid = $r->get('id');
        $s = $r->get('shu');
        //查询购买物品数据
        $mod = new ShopcarDB();
        $rst = $mod::findOne(['id'=>$shopid]);
        if ($rst){
            $mods = new ShopDB();
            $rst = $mods::findOne(['id'=>$rst->attributes['sid']]);
            return $this->render('shoped',['data'=>$rst->attributes,'shu'=>$s]);
        }
    }

    //在购物车批量购买
    public function actionCarshops(){
        $r = \Yii::$app->request;
        $ss = count($r->post('id'));
        $data = [];
        for($i=0 ; $i<$ss ; $i++){
            $shopid = $r->post('id')[$i];
            $s = $r->post('shul')[$i];
            //查询购买物品数据
            $mod = new ShopcarDB();
            $rst = $mod::findOne(['id'=>$shopid]);
            if ($rst){
                $mods = new ShopDB();
                $rst = $mods::findOne(['id'=>$rst->attributes['sid']]);
                $data[$i] = $rst->attributes;
                $data[$i]['shu'] = $s;
            }
        }
        return $this->render('shopeds',['data'=>$data]);
    }
    //确认购买
    public function actionShoped(){
        $r = \Yii::$app->request;
        $shopid = $r->get('id');
        $s = $r->get('shu');
        //查询购买物品数据
        $mod = new ShopDB();
        $rst = $mod::findOne(['id'=>$shopid]);
        return $this->render('shoped',['data'=>$rst->attributes,'shu'=>$s]);
    }
    //类型搜索
    public function actionType(){
        $type = \Yii::$app->request->get('id');
        $mod = new ShopDB();
        $data = $mod->type($type);
        return $this->render('sousuo',['data'=>$data]);
    }
    //关键字搜索
    public function actionKey(){
        $key = \Yii::$app->request->get('key');
        $mod = new ShopDB();
        $data = $mod->type($key);
        return $this->render('sousuo',['data'=>$data]);
    }
    public function actionPaytest(){
        $order_id = '200000001' . time();
        $gift_name = '元宝充值';
        $money = 0.01;
        $body = '元宝充值测试';
        $show_url = 'https://openapi.alipay.com/gateway.do';
        $alipay = new \app\yii2_alipay\AlipayPay();
//        $html = $alipay->requestPay($order_id, $gift_name, $money, $body, $show_url);
//        echo $html;
    }
}
