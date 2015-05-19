<?php

/**
 * Class BigShotsController
 * 大咖秀
 */
class BigShotsController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }

    public function actionIndex()
    {
    
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/common.css');
        if(defined('BIG_SHOTS_RECOMMEND_VIDEO')){
            $recommend = CJSON::decode(BIG_SHOTS_RECOMMEND_VIDEO);
        }
        $time=date('Y-m-d H:i:s');
    	$sql = "select * from starjourney order by prestarttime  asc limit 11";
        $command = Yii::app()->db->createCommand($sql);
        $zhibo = $command->queryAll();
    	
    	
        $this->render('index',array('zhibo'=>$zhibo));
    }

    public function actionDetail()
    {
        $this->render('detail');
    }
    public function actionPlayvideo()
    {

    	$id = Yii::app()->getRequest()->getParam("id");
		$videodata=Product::model()->findByPk($id);

		$sql = "select * from product where customer_id='{$videodata[customer_id]}' && type='video' && product_id <> '{$id}'  order by created desc limit 3";
		
        $command = Yii::app()->db->createCommand($sql);
        $videodatas = $command->queryAll();

		$stardata=Customer::model()->findByPk($videodata[customer_id]);
		$starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $videodata[customer_id]));
		
        $this->render('playvideo',array('videodata'=>$videodata,'starinfodata'=>$starinfodata,'stardata'=>$stardata,'videodatas'=>$videodatas));
    }
}