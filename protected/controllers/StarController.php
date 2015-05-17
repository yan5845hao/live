<?php

class StarController extends BaseController
{
    public function init()
    {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/star.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/common.css');
    }
    public function actionIndex()
    {

    	  $sql = "select * from star_schedule order by begintime desc limit 6";
          $command = Yii::app()->db->createCommand($sql);
          $newsstar = $command->queryAll();

           $sql = "select * from star_schedule order by begintime desc ";
          $command = Yii::app()->db->createCommand($sql);
          $newsstarall = $command->queryAll();

        $this->render('index',array('newsstar'=>$newsstar,'newsstarall'=>$newsstarall));
    }

    public function actionInfo()
    {

    	$id = Yii::app()->getRequest()->getParam("id");
		$newsdata=StarSchedule::model()->findByPk($id);
		
		$this->render('info',array('newsdata'=>$newsdata));
    }


    public function actionDetail()
    {
        $this->render('detail');
    }
}