<?php

class Product extends CActiveRecord
{

    public static $productTypeName =  array(
                'video' => '视频',
                'music' => '音乐',
                'other' => '明星档'
            );
    /**
     * Returns the static model of the specified AR class.
     * @return Configuration the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
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
            array('title,type,ordered,customer_id', 'required'),
            array('content,url,image,product_tag,stock_status,created,last_updated,fans_total,play_total', 'safe'),
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

	public function updateplay_total($id){
			$model=Product::model()->findByPk($id);
			$model->play_total = ($model->play_total+1);
			$model->save();
	}

	public function rankvalue($type,$num=5){
		if($type=='all'){ 
			$sql = "select * from product  order by play_total desc limit {$num}";
		}else{ 
			$sql = "select * from product where video_type = '{$type}' order by play_total desc limit {$num}";
		}

		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
		return $result;
	}
}
