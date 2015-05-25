<?php
/**
 * This is the model class for table "banners".
 *
 */
class Starjourney extends CActiveRecord
{
        /**
         * Returns the static model of the specified AR class.
         * @return Banners the static model class
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
                return 'starjourney';
        }
        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                	 array('liveid,roomid,mastername,prestarttime', 'required'),
                         array('liveid', 'length', 'max'=>40),
                         array('roomid', 'length', 'max'=>6),
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
                );
        }
        /*
        * star news paging
        */
       
	
}
