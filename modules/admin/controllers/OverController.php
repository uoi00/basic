<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii;

class OverController extends Controller
{
    public $session;
    protected $user;
    public function init(){
        $this->session = Yii::$app->session;
        if (!$this->session->get('user')['id']){
            return $this->redirect('./index.php?r=admin/test/index');
        }else{
            $this->user = $this->session->get('user');
        }
    }
}
