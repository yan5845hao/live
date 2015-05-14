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
        if (Yii::app()->user->isGuest) {
            //管理员模拟用户登陆
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == Yii::app()->params['admin']) {
                $customer_id = Yii::app()->request->getParam('customer_id');
                $customer = Customer::model()->findByPk($customer_id);
                if ($customer) {
                    $identify = new CustomerIdentity();
                    $identify->assignCustomer($customer);
                    Yii::app()->user->login($identify);
                    $this->redirect($this->createUrl('MyAccount/index'));
                } else {
                    Yii::app()->user->loginRequired();
                }
            } else {
                Yii::app()->user->loginRequired();
            }
        }
        $this->user = Yii::app()->user;
        $this->userID = $this->user->id;
        $this->layout = 'sign_layout';
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/account.css');
    }

    public function actionIndex()
    {


        echo Yii::app()->session['subtime'];
        $this->render('index');
    }

    public function actionGold()
    {
        $this->render('gold');
    }

    public function actionModify()
    {
        $this->render('modifyAccount');
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