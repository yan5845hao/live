<?php
/**
 * Class Order
 */
class Order extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return static the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_id,product_id', 'required'),
            array('order_id,payment_method, payment_info, cost, message, status, created, last_updated', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array();
    }

    public function addOrder($params)
    {
        $order_data = array(
            'payment_method' => isset($params['payment_method']) ? $params['payment_method'] : 1,
            'payment_info' => $params['payment_info'],
            'cost' => $params['cost'],
            'message' => isset($params['message']) ? $params['message'] : '',
            'status' => 1,
            'created' => new CDbExpression('NOW()'),
            'last_updated' => new CDbExpression('NOW()'),
            'customer_id' => Yii::app()->user->id,
            'product_id' => $params['product_id']
        );
        $model = new Order();
        $model->setAttributes($order_data);
        if ($model->save()) {
            return $model->order_id;
        } else {
            return false;
        }
    }
}