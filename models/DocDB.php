<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
class DocDB extends ActiveRecord{

    public static function tableName(){
        return '{{doc}}';
    }
    //查询/搜索管理员列表
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
            $id = '36' . date('dym') . rand(0, 9999);
            $this->id = $id;
            $this->addr = htmlspecialchars($data['addrs']);
            $this->name = htmlspecialchars($data['names']);
            $this->tel = htmlspecialchars($data['tels']);
            $this->res = htmlspecialchars($data['user']);
            $this->shu = htmlspecialchars($data['shuls']);
            $this->user = \Yii::$app->session->get('users')['id'];
            $this->time = date("Y-m-d H:i:s");
            if ($this->save()) {
                return $id;
            } else {
                return null;
            }
        }
    }
    //修改账号
    public function editdoc($data){
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
    public function deldoc($id){
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