	<?php
	class NewsController extends BaseController
	{
		public function actionIndex(){

				$page =intval(Yii::app()->getRequest()->getParam("page"));
				$star_id =intval(Yii::app()->getRequest()->getParam("id"));
				$criteria = new CDbCriteria();
				if($star_id>0) $criteria->addCondition("star_id = ".$star_id);
		        $criteria->order = 'createtime desc';
		        $dataProvider = new CActiveDataProvider('StarNews', array(
		            'criteria' => $criteria,
		            'pagination' => array(
		                'pageSize' => 10,
		                'pageVar' => 'page'
		            ),
		        ));
				if (Yii::app()->request->isAjaxRequest) {
            	$this->layout = 'blank_layout';
            	Yii::app()->clientScript->reset();
            	$this->render('list_ajax', array('dataProvider' => $dataProvider,'currentPage' => ($dataProvider->pagination->currentPage + 1)));
        		} else {
        			if($star_id<1) $star_id=3;
        			$stardata=Customer::model()->findByPk($star_id);//获取明星基本资料
					$starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $star_id));//获取明星详细资料
					$this->render('index',array('dataProvider'=>$dataProvider,'stardata'=>$stardata,'starinfodata'=>$starinfodata));
				}

		}
		public function actionInfo(){

				$newsid = Yii::app()->getRequest()->getParam("id");
				$newsdata=StarNews::model()->findByPk($newsid);
				if($newsid>1) StarNews::model()->updatelook($newsid);
				$stardata=Customer::model()->findByPk($newsdata[star_id]);//获取明星基本资料
				$starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $newsdata[star_id]));//获取明星详细资料
				if(Yii::app()->user->id){ 
					//$attention=new CustomerAttention();
					$isattention= CustomerAttention::model()->isattention(Yii::app()->user->id,$newsdata['star_id']);
				}else{ 
					$isattention=false;
				}
					/*获取评论数据*/
		
				$criteria = new CDbCriteria(); 
				$criteria->order = 'create_time desc'; 
				$criteria->addCondition('starid='.$newsdata[star_id]);  
				$criteria->addCondition('type= :type');
				$criteria->params[':type']='news';
				$dataProvider=new CActiveDataProvider('Comment',array(
		            'criteria'=>$criteria,
		            'pagination'=>array(
		            'pageSize'=>5,
		            ),
		        ));
				$this->render('info',array('newsdata'=>$newsdata,'stardata'=>$stardata,'starinfodata'=>$starinfodata,'isattention'=>$isattention,'dataProvider'=>$dataProvider));

		}



	}