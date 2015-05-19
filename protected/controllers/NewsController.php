	<?php
	class NewsController extends BaseController
	{
		public function actionIndex(){

				$page =intval(Yii::app()->getRequest()->getParam("page"));
				$star_id =intval(Yii::app()->getRequest()->getParam("id"));
				$stardata=Customer::model()->findByPk($star_id);//获取明星基本资料
				$starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $star_id));//获取明星详细资料
				if($star_id<1) $star_id=null;
				if($page<2) $page=1;
				$newsdata=StarNews::model()->getNews($page,$star_id);
				
				$this->render('index',array('newsdata'=>$newsdata,'stardata'=>$stardata,'starinfodata'=>$starinfodata));

		}
		public function actionInfo(){

				$newsid = Yii::app()->getRequest()->getParam("newsid");
				$newsdata=StarNews::model()->findByPk($newsid);

				$stardata=Customer::model()->findByPk($newsdata[star_id]);//获取明星基本资料
				$starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $newsdata[star_id]));//获取明星详细资料
				//print_r($newsdata);
				$this->render('info',array('newsdata'=>$newsdata,'stardata'=>$stardata,'starinfodata'=>$starinfodata));

		}



	}