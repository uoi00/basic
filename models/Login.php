<?php
namespace app\models;

class Login extends \yii\base\Model{

    public $user;
    public $password;
    public $verifyCode; //添加的验证码字段

    public function rules(){
        return [
            ['user' , 'required' , 'message' => '账号不能为空'],
            ['password' , 'required' , 'message' => '密码不能为空'],
            ['verifyCode' , 'captcha' , 'captchaAction' => 'home/index/captcha' , 'message'=>'验证码不正确'],
        ];
    }
}