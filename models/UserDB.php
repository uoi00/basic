<?php

namespace app\models;
/*
 *用户模型 用于添加用户
*/
use yii\db\ActiveRecord;

class UserDB extends ActiveRecord{

    public static function tableName(){
        return '{{user}}';
    }

/*    public function getId($user){
        $rst = $this::find()->select('id')->where('user=:user',[':user'=>$user])->one();
        return $rst->attributes['id'];
    }

    public function getUser($id){
        $rst = $this::find()->select('user')->where('user=:user',[':user'=>$id])->one();
        return $rst->attributes['user'];
    }*/
}