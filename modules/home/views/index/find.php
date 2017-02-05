<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
    <h3 class="col-sm-offset-2">密码找回</h3><br>

<?=html::beginForm('','post',['class'=>'form-horizontal']);?>
    <div class="form-group">
        <?=Html::label('邮箱账号：','user',['class' => 'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=Html::activeTextInput($model, 'user' , ['class' => 'input users form-control'])?>
            <?=Html::error($model,'user',['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('邮箱验证码：','mail',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-5">
            <?=Html::activeTextInput($model , 'mail' , ['class'=>'form-control col-sm-7'])?>
            <?=Html::error($model , 'mail' , ['class'=>'error'])?>
        </div>
        <div class="col-sm-5">
            <?=Html::button('验证码',['class'=>'btn btn-info col-sm-2','id'=>'mks','title'=>'获取验证码'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('密码：','password',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=Html::activePasswordInput($model , 'password' , ['class'=>'form-control'])?>
            <?=Html::error($model , 'password' , ['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('重复密码：','repassword',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=Html::activePasswordInput($model , 'repassword' , ['class'=>'form-control'])?>
            <?=Html::error($model , 'repassword' , ['class'=>'error'])?>
        </div>
    </div>
    <div class="form-group">
        <?=Html::label('验证码：','verifycode',['class'=>'control-label col-sm-2'])?>
        <div class="col-sm-8">
            <?=\yii\captcha\Captcha::widget([
                'name' => 'Find[verifyCode]', //这里不需要 model 字段，直接自己定义
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
        <?=Html::submitButton("确认修改",['class'=>'btn btn-info']);?>
    </div>

<?=html::endForm();?>
<script src="./front/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mks").click(function () {
            var mail = $('.users').val();
            var ru = /^([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
            var rzt= mail.match(ru);
            if (rzt){
                btn_time($("#mks"));
                $.post('./index.php?r=home/index/mail',{mail:mail},function (msg) {
                    if (msg == 'have'){
                        alert('您的邮箱未注册用户，请前往注册界面')
                    }else if (msg=='false'){
                        alert('数据错误');
                    }
                });
            }else {
                alert('请填写正确邮箱');
                return;
            }
        });
    });
    //倒计时按钮
    function btn_time(btn) {
        var count = 30;
        var countdown = setInterval(CountDown, 1000);
        function CountDown() {
            $(btn).attr("disabled", true);
            $(btn).text(count + "秒后重新获取");
            if (count == 0) {
                $(btn).val("获取验证码").removeAttr("disabled");
                clearInterval(countdown);
            }
            count--;
        }
    }
</script>
