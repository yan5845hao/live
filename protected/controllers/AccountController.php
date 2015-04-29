<?php

/**
 * Class AccountController
 * @author Demi 992392919@qq.com
 */
class AccountController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }

    public function actionIndex()
    {
        if (Yii::app()->user->isGuest) {
            Yii::app()->user->loginRequired();
        } else {
            $this->redirect($this->createUrl('MyAccount/index'));
        }
    }

    public function actionRegister()
    {
        $sms = new Sms;
        $_SESSION['send_code'] = $sms->random(6, 1);
        echo $_SESSION['send_code'];
        $form = new RegisterForm();
        if ($_POST) {
            if ($_POST['mobile'] != $_SESSION['mobile'] or $_POST['mobile_code'] != $_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])) {
                $form->addError('mobile_code','手机验证码输入错误');
            } else if ($form->validate()) {
                $form->addError('mobile_code','手机验证码输入错误');
            }
            /**
             *
            $_SESSION['mobile'] = '';
            $_SESSION['mobile_code'] = '';
             */
        }
        $this->render('register', array('model' => $form));
    }

    public function actionVerifyCode()
    {
        $mobile = Yii::app()->getRequest()->getParam('mobile');
        $send_code = Yii::app()->getRequest()->getParam('send_code');
        $sms = new Sms;
        $sms->mobile = $mobile;
        if (empty($mobile)) {
            echo CJSON::encode(array('msg' => '手机号码不能为空'));
            Yii::app()->end();
        }
        //防用户恶意请求
        if (empty($_SESSION['send_code']) or $send_code != $_SESSION['send_code']) {
            echo CJSON::encode(array('msg' => '请求超时，请刷新页面后重试'));
            Yii::app()->end();
        }
        $gets = $sms->SendSMS();
        echo CJSON::encode(array('msg' => $gets['SubmitResult']['msg']));
        Yii::app()->end();
    }
}