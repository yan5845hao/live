<?php

/**
 * Class MyAccountController
 * @author Demi 992392919@qq.com
 */
class MyAccountController extends BaseController
{
    protected $user;
    protected $userID = null;

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->session = Yii::app()->session;
        if (Yii::app()->user->isGuest) Yii::app()->user->loginRequired();
        $this->user = Yii::app()->user;
        $this->userID = $this->user->id;
        $this->layout = 'sign_layout';
    }
    public function actionIndex()
    {
               
         
         echo Yii::app()->session['subtime'];
        $this->render('index');
    }
    public function actionmydata()
    {
        $this->render('index');
    }
    public function actionmypassword()
    {
        $this->render('mypassword');
    }
}