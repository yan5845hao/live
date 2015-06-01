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
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/main.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/common.css');

        $starJourney = Yii::app()->db->createCommand("select * from starjourney order by prestarttime  asc limit 11")->queryAll();

        $keyword = Yii::app()->request->getParam('keyword');
        $criteria = new CDbCriteria();
        $criteria->addCondition("type = 'video'");
        if ($keyword) {
            $criteria->addSearchCondition("title", "%$keyword%");
        }
        $criteria->order = 'created desc';
        $dataProvider = new CActiveDataProvider('product', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 2,
                'pageVar' => 'page'
            ),
        ));
        if (Yii::app()->request->isAjaxRequest) {
            $this->layout = 'blank_layout';
            Yii::app()->clientScript->reset();
            $this->render('list_ajax', array('dataProvider' => $dataProvider,'currentPage' => ($dataProvider->pagination->currentPage + 1)));
        } else {
            $this->render('index', array('zhibo' => $starJourney, 'dataProvider' => $dataProvider));
        }
    }

    public function actionDetail()
    {
        $this->redirect(Yii::app()->createUrl('/bigShots/playvideo'));
    }

    public function actionPlayvideo()
    {

        $id = Yii::app()->getRequest()->getParam("id");
        Product::model()->updateplay_total($id);
        $videodata = Product::model()->findByPk($id);
        if ($videodata === null)
            throw new CHttpException(404, 'The requested page does not exist.');


        $sql = "select * from product where customer_id='{$videodata[customer_id]}' && type='video' && product_id <> '{$id}'  order by created desc limit 3";

        $command = Yii::app()->db->createCommand($sql);
        $videodatas = $command->queryAll();

        $stardata=Customer::model()->findByPk($videodata[customer_id]);
        $starinfodata=CustomerInfo::model()->findByAttributes(array('customer_id' => $videodata[customer_id]));
        /*获取评论数据*/


        $criteria = new CDbCriteria();
        $criteria->order = 'create_time desc';
        $criteria->addCondition('starid='.$videodata[customer_id]);
        $criteria->addCondition('type= :type');
        $criteria->params[':type']='video';
        $dataProvider=new CActiveDataProvider('Comment',array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>7,
            ),
        ));
        if(Yii::app()->user->id){//判断是否关注
            //$attention=new CustomerAttention();
            $isattention= CustomerAttention::model()->isattention(Yii::app()->user->id,$videodata[customer_id]);
        }else{
            $isattention=false;
        }
        $this->render('playvideo',array('videodata'=>$videodata,'starinfodata'=>$starinfodata,'stardata'=>$stardata,'videodatas'=>$videodatas,'dataProvider'=>$dataProvider,'isattention'=>$isattention));
    }
}