<?php
/**
 * Class Customer
 */
class Currency extends CActiveRecord
{
    public $code = 'GB';

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
        return 'currency';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,code,exchange_rate,last_updated', 'safe'),
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

    public function getExchangeRate()
    {
        $currency = $this->findByAttributes(array('code' => $this->code));
        if ($currency) {
            return $currency->exchange_rate;
        } else {
            return false;
        }
    }
}