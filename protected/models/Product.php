<?php

class Product extends CActiveRecord
{

    public static $productTypeName = array(
        'video' => '视频',
        'music' => '音乐',
        'other' => '明星档'
    );
    public static $productStatus = array(
        '1' => '未支付',
        '2' => '已支付',
        '3' => '已取消'
    );
    const RECHARGE_VIP_TYPE_ID = 101; //会员充值类型ID
    const PRODUCT_PROJECT_TYPE_ID = 102; //众筹产品类型ID

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
            array('title,product_type_id,customer_id', 'required'),
            array('content,url,image,default_price,special_price,product_tag,ordered,stock_status,active,created,last_updated,fans_total,play_total,video_type,talk_total,video_types', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'customer' => array(self::BELONGS_TO, 'customer', 'customer_id')
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
            $sql = "select * from where product_type_id='2' product  order by play_total desc limit {$num}";
        } else {
            $sql = "select * from product where product_type_id='2' && video_type = '{$type}' order by play_total desc limit {$num}";
        }

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();

        return $result;
    }


    public function getProject()
    {
        $project = ProductProject::model()->findByAttributes(array('product_id' => $this->product_id));
        return $project;
    }

    public function getProjectOrderCount()
    {
        $sql = "select count(*) from `order` where product_id = $this->product_id";
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public function getProjectReleaseMap()
    {
        $map = array();
        $sql = "select p.customer_id, count(*) as count from `product` p inner join `product_type` pt on p.product_type_id = pt.product_type_id where pt.parent_product_type_id = ".self::PRODUCT_PROJECT_TYPE_ID." group by customer_id";
        $command = Yii::app()->db->createCommand($sql)->queryAll();
        foreach($command as $list)
        {
            $map[$list['customer_id']] = $list['count'];
        }
        return $map;
    }
}
