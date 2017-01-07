<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class TypeDB extends ActiveRecord{

    public static function tableName(){
        return '{{type}}';
    }
    //查询列表
    public function typelist($list,$page){
        $cont = $this::find()->count();
        $datas = $this::find()->select(['id','name','prt'])->where(['prt'=>'0'])->all();
        foreach ($datas as $k=>$v){
            $clds =  $this::find()->select(['id','name','prt'])->where(['prt'=>$v->attributes['id']])->all();
            foreach ($clds as $k1=>$v1){
                $clds[$k1] = $v1->attributes;
            }
            $datas[$k] = $v->attributes;
            $datas[$k]['children'] = $clds;
        }
        echo  json_encode(['total'=>$cont,'rows'=>$datas]);
    }
    //添加
    public function addtype($data){
        $this->name = $data['name'];
        $this->prt = $data['prt'];
        if ($this->save()){
            echo '{"fruit":"true","msg":"添加成功"}';
        }else{
            exit('{"fruit":"false","msg":"发生错误"}');
        }
    }
    //修改账号
    public function edittype($data){
        $rst = $this::findOne($data['id']);
        $rst->name = $data['name'];
        $rst->prt = $data['prt'];
        if ($rst->save() ){
            echo '{"fruit":"true","msg":"修改成功"}';
        }else{
            exit('{"fruit":"false","msg":"数据错误"}');
        }
    }
    //删除用户
    public function deltype($id){
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
    //获取子元素
    public function getsel($prt){
        $data = $this::findAll(['prt'=>$prt]);
        foreach ($data as $k=>$v) {
            $data[$k] = $v->attributes;
        }
        return $data;
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