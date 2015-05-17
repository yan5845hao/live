	<?php
	class NewsController extends BaseController
	{
		public function actionIndex(){

				$page =intval(Yii::app()->getRequest()->getParam("page"));
				if($page<2) $page=1;
				$newsdata=StarNews::model()->getNews($page);
				
				$this->render('index',array('newsdata'=>$newsdata));

		}
		public function actionInfo(){

				$newsid = Yii::app()->getRequest()->getParam("newsid");
				$newsdata=StarNews::model()->findByPk($newsid);
				//print_r($newsdata);
				$this->render('info',array('newsdata'=>$newsdata));

		}



	}