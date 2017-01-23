<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class DocDB extends ActiveRecord{

    public static function tableName(){
        return '{{doc}}';
    }
    //查询列表
    public function doclist($list,$page,$demand=''){
        if ($demand == ''){
            $datas = $this::find()->orderBy('time desc');
        }else{
            $datas = $this::find()->where(['like','id',$demand])->orWhere(['status'=>$demand])->orderBy('time desc');
        }
        $pages = new Pagination(['totalCount' =>$datas->count(), 'pageSize' => $list]);
        $model = $datas->offset($page-1)->limit($pages->limit)->all();
        foreach ($model as $k=>$v){
            $model[$k] = $v->attributes;
        }
        $mod = json_encode($model);
        echo '{"total" : '.$datas->count().', "rows" : '.$mod.'}';
    }
    //添加
    public function adddoc($data){
        if ($data['addrs']&&$data['names']&&$data['tels']) {
            $id = '36' . date('dym') . substr(time(),-4,2) . rand(0, 99);
            $this->id = $id;
            $this->addr = htmlspecialchars($data['addrs']);
            $this->name = htmlspecialchars($data['names']);
            $this->tel = htmlspecialchars($data['tels']);
            $this->res = htmlspecialchars($data['user']);
            $this->shu = htmlspecialchars($data['shuls']);
            $this->user = \Yii::$app->session->get('users')['id'];
            $this->money = htmlspecialchars($data['money']);
            $this->time = date("Y-m-d H:i:s");
            if ($this->save()) {
                return ['id'=>$id , 'name' => $data['names'] ,'res'=>$data['user']];
            } else {
                return null;
            }
        }else{
            return false;
        }
    }
    //修改
    public function editdoc($data){
        $rst = $this::findOne($data);
        $rst->status = '已付款，未发货';
        if ($rst->save()){
            return true;
        }else{
            return false;
        }
    }
    //删除
    public function deldoc($id){
        if($this::deleteAll(['id'=>$id])){
            echo 'true';
        }else{
            exit('false');
        }
    }
    //用户查找
    public function usel($user,$type=''){
        if ($type){
            $rst = $this::find()->where(['user'=>$user])->andWhere(['status'=>$type])->all();
        }else{
            $rst = $this::find()->where(['user'=>$user])->all();
        }
        if ($rst){
            foreach ($rst as $k=>$v){
                $rst[$k] = $v->attributes;
            }
        }
        return $rst;
    }
}