<?php

/**
 * Class BigShotsController
 * 直播
 */
class LiveController extends BaseController
{
	public function actionIndex(){ 
		
		$prestarttime=date('Y:m:d H:i:s');
		$criteria = new CDbCriteria();
		$criteria->order = 'prestarttime ASC';
		$criteria->addCondition("prestarttime > '$prestarttime' ");
		
		$dataProvider=new CActiveDataProvider('Starjourney',array(
                'criteria'=>$criteria,
                 'pagination'=>array(
                        'pageSize'=>40,
                        ),
        ));
      
		$dataProvider=$dataProvider->getData();
	
        $this->render('index',array('dataProvider'=>$dataProvider));

	}

}


?>