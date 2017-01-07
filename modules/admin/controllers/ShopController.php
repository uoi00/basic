<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\models\ShopDB;
use app\models\TypeDB;
class ShopController extends Controller{
    public $enableCsrfValidation = false;
    //查询商品列表
    public function actionShoplist(){
        $mod = new ShopDB();
        $r = \Yii::$app->request;
        $r->post('shopname')?$d = $r->post('shopname'):$d = '';
        $mod->shoplist($r->post('list'),$r->post('page'),$d);
    }
    //添加商品 /*调试上传文件*/
    public function actionAddshop(){
        if (\Yii::$app->request->isPost) {
            $file = $_FILES['img'];
            if ($file['type'] = 'image/png' || $file['type'] = 'image/jpeg'){
                if ($file['error']>0){
                    echo json_encode(['fruir'=>'false','msg'=>'上传错误']);
                }else{
                    $path = './uploads/img/'. substr(md5($file['name']),0,6). '.png';
                    if(!move_uploaded_file($file['tmp_name'],$path)){
                        return ;
                    }
                }
            }
        }else{
            echo json_encode(['fruir'=>'false','msg'=>'格式错误']);
        }
        $mod = new ShopDB();
        $data = \Yii::$app->request->post();
        $data['img'] = $path;
        $mod ->addshop($data);
    }
    //修改
    public function actionEditshop(){
        $mod = new ShopDB();
        $mod ->editshop(\Yii::$app->request->post());
    }
    //删除
    public function actionDelshop(){
        $mod = new shopDB();
        $s = \Yii::$app->request->post('ids');
        $mod ->delshop($s);
    }
    //获取分类类型
    public function actionShoptype(){
        $mod = new TypeDB();
        $data = $mod->getsel('1');
        echo json_encode($data);
    }
    //获取分类颜色
    public function actionShopcolor(){
        $mod = new TypeDB();
        $data = $mod->getsel('28');
        echo json_encode($data);
    }
    //获取分类用途
    public function actionShopyotu(){
        $mod = new TypeDB();
        $data = $mod->getsel('2');
        echo json_encode($data);
    }
    //获取分类包装
    public function actionShopbaoz(){
        $mod = new TypeDB();
        $data = $mod->getsel('3');
        echo json_encode($data);
    }
}