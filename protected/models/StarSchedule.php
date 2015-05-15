<?php
/**
 * This is the model class for table "banners".
 *
 */
class StarSchedule extends CActiveRecord
{
        /**
         * Returns the static model of the specified AR class.
         * @return star_schedule the static model class
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
                return 'star_schedule';
        }
        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                	     array('title,starid,starname,begintime,address,content', 'required'),
                             array('title', 'length', 'max'=>128),
                             array('starname', 'length', 'max'=>40),
                             array('address', 'length', 'max'=>128),
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
       public function getSchedule($begintime){
            
            $begintimeend=$begintime+86400;
          
            $sql = "select * from star_schedule where begintime > :begintime && begintime < :begintimeend order by begintime asc limit 3";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(':begintime', $begintime);
            $command->bindParam(':begintimeend', $begintimeend);
            return $command->queryAll();
           
        }   
	
}
