<?php

namespace app\models;

use yii\db\ActiveRecord;
class ShopcarDB extends ActiveRecord
{
    public static function tableName()
    {
        return '{{shopcar}}';
    }
    //查询id
    public function selid($id,$uid){
        return $this::find()->where(['sid'=>$id])->andWhere(['uid'=>$uid])->one();
    }
    //取消购买
    public function delcar($id){
        if($this::deleteAll(['id'=>$id])){
            echo 'true';
        }else{
            exit('false');
        }
    }
}