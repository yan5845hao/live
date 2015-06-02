<?php

class SiteController extends BaseController
{

    public function actionIndex()
    {
//        if (Yii::app()->user->isGuest) {
//            $this->forward('site/login');
//        } else {
//            $this->render('index');
//        }
    	//Yii::app()->redis_cache->set('aaaa','value');
    	//echo Yii::app()->redis_cache->get('aaaa');exit;
    	$date=strtotime(date('Y-m-d'));
    	$scheduledata = StarSchedule::model()->getSchedule($date);
		$model=new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

        $this->render('index',array('scheduledata'=>$scheduledata,'model'=>$model));
    }

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
            $this->render('error', $error);
//	    	if(Yii::app()->request->isAjaxRequest)
//	    		echo $error['message'];
//	    	else
//	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout = 'sign_layout';
        
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){

				$cookie = Yii::app()->request->getCookies();
        		if(isset($cookie['subtime']->value)){
        			Yii::app()->session['subtime'] = date("Y-m-d H:i:s",$cookie['subtime']->value);
        		}else{
        			Yii::app()->session['subtime'] = '你已经超过30天没有登录了';
        		}
				$cookie = new CHttpCookie('subtime',time());
                $cookie->expire = time()+60*60*24*30;  //有限期30天
                Yii::app()->request->cookies['subtime']=$cookie;

				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->session['face']= '/images/default.png';
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}
