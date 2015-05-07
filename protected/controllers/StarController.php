<?php

class StarController extends BaseController
{
    public function actionIndex()
    {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/star.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/common.css');
        $this->render('index');
    }
}