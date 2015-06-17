<?php
class CustomerFavorite extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerFavorite the static model class
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
        return 'customer_favorite';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, customer_id, created, last_updated', 'required'),
            array('product_id, customer_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('customer_favorite_id, product_id, customer_id, created, last_updated', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product'=>array(self::BELONGS_TO , 'Product','product_id'),
            'customer'=>array(self::BELONGS_TO , 'Customer','customer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'customer_favorite_id' => 'Customer Favorite',
            'product_id' => 'Product',
            'customer_id' => 'Customer',
            'created' => 'Added Time',
            'last_updated' => 'Updated Time',
        );
    }

    /**
     * @return array get all product of customer
     */
    public function getAllProductOfCustomer($customer_id)
    {
        $sql = 'select * from ' . $this->tableName() . ' where product_id!=0 and customer_id=' . intval($customer_id);
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

}
