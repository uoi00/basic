<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class ShopDB extends ActiveRecord{

    public static function tableName(){
        return '{{shop}}';
    }
    //查询/搜索管理员列表
    public function shoplist($list,$page,$demand=''){
        if ($demand == ''){
            $datas = $this::find();
        }else{
            $datas = $this::find()->Where(['like','user',$demand])->orWhere(['like','type',$demand]);
        }
        $pages = new Pagination(['totalCount' =>$datas->count(), 'pageSize' => $list]);
        $model = $datas->offset($page-1)->limit($pages->limit)->all();
        foreach ($model as $k=>$v){
            $model[$k] = $v->attributes;
        }
        $mod = json_encode($model);
        echo '{"total" : '.$datas->count().', "rows" : '.$mod.'}';
    }
    //添加管理员
    public function addshop($data){
        $this->user = $data['user'];
        $this->time = date("Y-m-d h:i:s");
        $this->type = $data['type'] .','.$data['yotu'].','.$data['baoz'] .','.$data['color'];
        $this->img = $data['img'];
        $this->price = $data['price'];
        $this->nums = $data['nums'];
        $this->cont = $data['cont'];
        $this->remark = $data['remark'];
        if ($this->save()){
            echo '{"fruit":"true","msg":"添加成功"}';
        }else{
            exit('{"fruit":"false","msg":"发生错误"}');
        }
    }
    //修改账号
    public function editshop($data){
        if (md5($data['pwdo']) ==$this->sel($data['id'])->attributes['pwd'] ){
            $rst = $this::findOne($data['id']);
            $rst->pwd = md5($data['pwdn']);
            $rst->save();
            echo '{"fruit":"true","msg":"修改成功"}';
        }else{
            exit('{"fruit":"false","msg":"密码错误"}');
        }
    }
    //删除用户
    public function delshop($id){
        if($this::deleteAll(['id'=>$id])){
            echo '{"fruit":"true","msg":"删除成功"}';
        }else{
            exit('{"fruit":"false","msg":"数据错误"}');
        }
    }
    //查找账号
    private function sel($user){
        return $this::find()->select('pwd')->where('id=:id',[':id'=>$user])->one();
    }
    //根据用户查找id
    public function getId($user){
        $rst = $this::find()->select('id')->where('user=:user',[':user'=>$user])->one();
        return $rst->attributes['id'];
    }
    //根据id查找用户
    public function getUser($id){
        $rst = $this::find()->select('user')->where('user=:user',[':user'=>$id])->one();
        return $rst->attributes['user'];
    }
}