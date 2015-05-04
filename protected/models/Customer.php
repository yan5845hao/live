<?php
/**
 * Class RegisterForm
 */
class Customer extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return static the static model class
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
        return 'customer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('phone,password', 'required'),
            array('phone, password, name, gender, vip_code, face, active, address', 'safe'),
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
            'phone' => '手机',
            'password' => '密码',
            'name' => '名称',
            'gender' => '性别',
            'vip_code' => 'VIP',
            'face' => '头像',
            'address' => '地址',
        );
    }

    public function md5($str){
        return md5('live_'.$str);
    }

    public function registerLive($customer_data)
    {
        try{
            $customer_data['password'] = $this->md5($customer_data['password']);
            $this->setAttributes($customer_data);
            $this->save();
            return true;
        }catch(Exception $e){
            $e->getMessage();
            return false;
        }
    }

}