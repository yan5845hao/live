<?php
/**
 * Class RegisterForm
 */
class CustomerAttention extends CActiveRecord
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
        return 'customer_attention';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_attention,starid', 'safe'), 
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
    public function addattention($customerid,$starid){ 
    	
    	if($this->isattention($customerid,$starid)==false){ 
	    	$model = new CustomerAttention();
	    	$model->customerid = intval($customerid);
	    	$model->starid = intval($starid);
			if($model->save()){ 
				return true;
			}else{ 
				return false;
			}
		}else{ 
			return false;
		}
    }
    public function isattention($customerid,$starid){ 

    	$attention=CustomerAttention::model()->find('customerid=:customerid && starid=:starid',array('customerid'=>$customerid,'starid'=>$starid));
    	if(!empty($attention)){ 
    		return true;	
    	}else{ 
    		return false;
    	}
		

    }
}