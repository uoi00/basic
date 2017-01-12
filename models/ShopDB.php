<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class ShopDB extends ActiveRecord{

    public static function tableName(){
        return '{{shop}}';
    }
    //查询商品列表
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
    //添加商品
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
    //修改商品
    public function editshop($data){
        $rst = $this::findOne($data['id']);
        $rst->price = $data['price'];
        $rst->nums = $data['nums'];
        $rst->cont = $data['cont'];
        $rst->remark = $data['remark'];
        if ($rst->save()){
            echo json_encode(['fruit'=>'true','msg'=>'修改成功']);
        }else{
            echo json_encode(['fruit'=>'false','msg'=>'数据错误']);
        }
    }
    //删除
    public function delshop($id){
        if($this::deleteAll(['id'=>$id])){
            echo '{"fruit":"true","msg":"删除成功"}';
        }else{
            exit('{"fruit":"false","msg":"数据错误"}');
        }
    }
    //类型查找
    public function type($t){
        $rst = $this::find()->where(['like','type',$t])->all();
        foreach ($rst as $k=>$v){
            $rst[$k] = $v->attributes;
        }
        return $rst;
    }
    //关键字查找
    public function key($key){
        $datas = $this::find()->Where(['like','user',$key])->orWhere(['like','type',$key])->all();
        foreach ($datas as $k=>$v){
            $datas[$k] = $v->attributes;
        }
        return $datas;
    }
    //查找
    private function sel($user){
        return $this::find()->select('pwd')->where('id=:id',[':id'=>$user])->one();
    }
}