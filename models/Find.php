<?php
namespace app\models;

class Find extends \yii\base\Model{

    public $user;
    public $password;
    public $repassword;
    public $verifyCode; //添加的验证码字段
    public $mail;

    public function rules(){
        return [
            [['user' , 'password' , 'repassword'] , 'required' , 'message' => '不得为空'],
            ['user' , 'email' , 'message' => '错误邮箱'],
            ['user' , 'hasmail' , 'params' => ['message'=>'账号已注册']],
            ['mail' , 'compare' , 'compareValue'=>\Yii::$app->session->get('mks') , 'message'=>'邮箱验证失败'],
            ['password' , 'string' , 'min'=>'6' , 'max'=>'18' , 'tooShort'=>'密码不得小于6位' , 'tooLong'=>'密码不得大于18位'],
            ['repassword' , 'compare' , 'compareAttribute'=>'password' , 'message' => '密码不一致'],
            ['verifyCode' , 'captcha' , 'captchaAction' => 'home/index/captcha' , 'message'=>'验证码错误'],
        ];
    }
    public function hasmail($attribute , $params){
        $user = new \app\models\UserDB();
        $rzt = $user::findAll(['user'=>$this->$attribute]);
        if (!$rzt){
            $this->addError($attribute , $params['message']);
        }
    }
}