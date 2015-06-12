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

	public function actionYuyue(){ 

		
		$id = intval(Yii::app()->getRequest()->getParam("id"));
		$livedata=Starjourney::model()->findByPk($id);
		$yuyue=CustomerLiveRelation::model()->find('liveid=:liveid && customerid=:customerid', array(':liveid' => $id,'customerid'=>Yii::app()->user->id));
		 if(isset($_GET['act']) && isset($_GET['id']) && !isset(Yii::app()->user->id) ){ 
		 		echo '<script type="text/javascript">alert("请登录以后再预约");</script>';

		 }
		if(!empty($yuyue)){ 
			$yuyue='已预约';	
		}else if(isset($_GET['act']) && isset($_GET['id']) && isset(Yii::app()->user->id) ){ 
			$model= new CustomerLiveRelation();
			$model->liveid = intval(Yii::app()->getRequest()->getParam("id"));
			$model->title = $livedata['title'];
			$model->liveIdentity = $livedata['liveIdentity'];
			$model->prestarttime = $livedata['prestarttime'];
			$model->customerid = Yii::app()->user->id;
			$model->createtime = time();
			$model->starname = $livedata['mastername'];
			$model->save();
			$yuyue='已预约';
		}else{ 
			$yuyue='我要预约';

		}
		$criteria = new CDbCriteria(); 
		$criteria->order = 'create_time desc'; 
		$criteria->addCondition('starid='.$livedata['id']);  
		$criteria->addCondition('type= :type');
		$criteria->params[':type']='yuyue'; 
		$dataProvider=new CActiveDataProvider('Comment',array(
		    'criteria'=>$criteria,
		    'pagination'=>array(
		    'pageSize'=>5,
		    ),
		));
		

		$this->render('yuyue',array('livedata'=>$livedata,'yuyue'=>$yuyue,'dataProvider'=>$dataProvider));

	}

}


?>