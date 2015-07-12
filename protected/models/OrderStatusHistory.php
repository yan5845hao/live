<?php
class OrderStatusHistory extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return OrderStatusHistory the static model class
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
        return 'order_status_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created, order_id, order_status_id', 'required'),
            array('updated_by, customer_notified', 'numerical', 'integerOnly'=>true),
            array('order_id, order_status_id', 'length', 'max'=>10),
            array('comments', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('order_status_history_id, comments, updated_by, customer_notified, created, order_id, order_status_id', 'safe', 'on'=>'search'),
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
        return array(
            'order_status_history_id' => 'Order Status History',
            'comments' => 'Comments',
            'updated_by' => 'Updated By',
            'customer_notified' => 'Customer Notified',
            'created' => 'Created',
            'order_id' => 'Order',
            'order_status_id' => 'Order Status',
        );
    }

    public static function insertStatusHistory($order_id, $status, $comments, $customer_notified = 1, $updated_by = 117){
        $data_array = array(
            'order_id' => $order_id,
            'order_status_id' => $status,
            'created' => new CDbExpression('NOW()'),
            'customer_notified' => $customer_notified,
            'updated_by' => $updated_by,
            'comments' => $comments
        );
        $orderStatus = new OrderStatusHistory();
        $orderStatus->setAttributes($data_array);
        return $orderStatus->save();
    }
}
