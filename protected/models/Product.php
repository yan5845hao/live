<?php

class Product extends CActiveRecord
{

    public static $productTypeName = array(
        'video' => '视频',
        'music' => '音乐',
        'other' => '明星档'
    );
    const RECHARGE_VIP_TYPE_ID = 101;           //会员充值类型ID

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('title,type,customer_id', 'required'),
            array('content,url,image,default_price,special_price,product_tag,ordered,stock_status,active,created,last_updated,fans_total,play_total,video_type,talk_total,video_types', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'customer' => array(self::BELONGS_TO, 'customer', 'customer_id'),
        );
    }

    public function updateplay_total($id)
    {
        $model = Product::model()->findByPk($id);
        $model->play_total = ($model->play_total + 1);
        $model->save();
    }

    public function rankvalue($type, $num = 5)
    {
        if ($type == 'all') {
            $sql = "select * from product  order by play_total desc limit {$num}";
        } else {
            $sql = "select * from product where video_type = '{$type}' order by play_total desc limit {$num}";
        }

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();

        return $result;
    }
}
