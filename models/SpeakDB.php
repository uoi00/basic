<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class SpeakDB extends ActiveRecord{

    public static function tableName(){
        return '{{speak}}';
    }
    //查询列表
    public function speaklist($list,$page,$demand=''){
        if ($demand == ''){
            $datas = $this::find()->orderBy('time desc');
        }else{
            $datas = $this::find()->where(['type'=>$demand])->orWhere(['ishf'=>$demand])->orderBy('time desc');
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
    public function addspeak($data){
        if (isset($data['user'])){
            $this->user = $data['user'];
        }else {
            $this->user = \Yii::$app->session->get('users')['id'];
        }
        $this->time = date("Y-m-d h:i:s");
        $this->type = $data['types'];
        $this->cont = htmlspecialchars($data['content']);
        $this->name = $data['names'];
        $this->tel = $data['tels'];
        isset($data['id']) ? $this->huifu = $data['id'] : 0;
        if ($this->save()){
            return true;
        }else{
            return false;
        }
    }
    //查找
    public function idsel($id){
        $datas = $this::find()->where(['user'=>$id])->orderBy('time desc')->all();
        if ($datas){
            foreach ($datas as $k=>$v){
                $datas[$k] = $v->attributes;
                if ($v->attributes['ishf'] == '已回复'){
                    $rst = $this::find()->where(['huifu'=>$v->attributes['id']])->one();
                    $datas[$k]['hf'] = $rst->attributes;
                }
            }
            return $datas;
        }else{
            return null;
        }
    }
    //修改商品
    public function editspeak($data){
        $rst = $this::findOne($data);
        $rst->ishf = '已回复';
        if ($rst->save()){
            return true;
        }else{
            return false;
        }
    }
    //删除
    public function delspeak($id){
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