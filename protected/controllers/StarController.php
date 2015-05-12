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
        $this->render('index');
    }

    public function actionDetail()
    {
        $this->render('detail');
    }
}