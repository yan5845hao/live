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
    
    	$date=strtotime(date('Y-m-d'));
    	$key=md5('getSchedule'.$date);
    	$scheduledata=Yii::app()->cache->get($key);
    	if(empty($scheduledata)){
    		$scheduledata = StarSchedule::model()->getSchedule($date);
    		Yii::app()->cache->set($key,$scheduledata,300);
		}
		$model=new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		$rankarray=array('all'=>'all','music'=>'音乐','movie'=>'影视' , 'arts'=>'综艺');
		foreach($rankarray as $k=>$v){ 
			$key = md5($k.$v.'rankvalue');
			$rankvalue[$k]=Yii::app()->cache->get($key);
			if(!$rankvalue[$k]){ 
				$rankvalue[$k]=Product::model()->rankvalue($v);
				Yii::app()->cache->set($key,$rankvalue[$k],3600);
			}
		}
		
        $this->render('index',array('scheduledata'=>$scheduledata,'model'=>$model,'rankvalue'=>$rankvalue));
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
