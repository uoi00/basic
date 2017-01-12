<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
    <h3 class="col-sm-offset-2">用户登录</h3><br>

<?=html::beginForm('','post',['class'=>'form-horizontal']);?>
    <div class="form-group">
        <?=Html::label('账号：','user',['class' => 'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=Html::activeTextInput($model , 'user' , ['class'=>'form-control','placeholder'=>'邮箱、手机号'])?>
            <?=Html::error($model,'user',['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('密码：','password',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=Html::activePasswordInput($model , 'password' , ['class'=>'form-control' , 'placeholder'=>'登陆密码'])?>
            <?=Html::error($model , 'password' , ['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('验证码：','verifycode',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=\yii\captcha\Captcha::widget([
                'name' => 'Login[verifyCode]', //这里不需要 model 字段，直接自己定义
                'captchaAction' => 'index/captcha', //验证码的 action 与 Model 是对应的
                'template' => '{input}{image}', //模板 , 可以自定义
                'options' => [ //input 的 Html 属性配置
                    'class' => 'input verifycode',
                    'id' => 'verifyCode'
                ],
                'imageOptions' => [//image 的 Html 属性配置
                    'class' => 'imagecode',
                    'alt' => '点击图片刷新'
                ]
            ]);
            ?>
            <?=Html::error($model,'verifyCode',['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group" align="center">
        <a href="<?=\yii\helpers\Url::to(['register'])?>">注册账号</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?=\yii\helpers\Url::to(['find'])?>">忘记密码</a>
    </div>
    <div class="form-group" align="center">
        <?=Html::submitButton("登陆",['class'=>'btn btn-info']);?>
    </div>

<?=html::endForm();?>