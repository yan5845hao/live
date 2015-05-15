	<?php
	class NewsController extends BaseController
	{
		public function actionInfo(){

				$newsid = Yii::app()->getRequest()->getParam("newsid");
				$newsdata=StarNews::model()->findByPk($newsid);
				//print_r($newsdata);
				$this->render('info',array('newsdata'=>$newsdata));


		}



	}