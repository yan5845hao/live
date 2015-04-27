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
    }
    public function actionIndex()
    {
        $this->breadcrumbs->add('我的途风', $this->createUrl('MyAccount/index'));
        $this->breadcrumbs->add('欢迎页');
        $this->render('index');
    }
}