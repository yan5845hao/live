<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
error_reporting(E_ALL^E_NOTICE);
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'home',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
        'application.controllers.BaseController',
		'application.models.*',
		'application.components.*',
	),

	'defaultController'=>'site',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
//		'db'=>array(
//			'connectionString' => 'sqlite:protected/data/blog.db',
//			'tablePrefix' => 'tbl_',
//		),
    
		// uncomment the following to use a MySQL database
        //mysql读写分离
		'db'=>array(
            'class' => 'application.extensions.DbConnectionMan',    //DbConnectionMan
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'enableProfiling' => YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
            'connectionString' => 'mysql:host=localhost;dbname=live',
            'username' => 'root',
            'password' => '123789aa',
            'enableSlave' => true,                  //Read write splitting function is swithable.You can specify this
            'slaves'=>array(                        //slave connection config is same as CDbConnection
                array(
                    'connectionString' => 'mysql:host=localhost;dbname=live',
                    'username'=>'root',
                    'password'=>'123789aa',
                    'emulatePrepare' => true,
                    'charset' => 'utf8',
                ),
//                array(
//                    'connectionString'=>'mysql:host=slave2;dbname=xxx',
//                    'username'=>'demo',
//                    'password'=>'xxx'
//                ),
            ),
		),
/*
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		*/
		'urlManager'=>array(
            'showScriptName'=>false,
			'urlFormat'=>'path',
            'caseSensitive'=>true,
            'showScriptName'=>false,
            'rules' => include('route.php'),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				array(
						'class'=>'CWebLogRoute',
	                    'levels'=>'trace, info, error, warning, xdebug',
	                    'categories' =>'system.db.*'
					),
			),
		),
        'sms'=>array(
            'class' => 'Sms',
            'url' => "http://106.ihuyi.cn/webservice/sms.php?method=Submit",
            'account' => 'cf_fjy',
            'password' => '123456'
        ),
        'aliyun'=>array (
            'class' => 'application.extensions.oss.Aliyun',
            'keyId' => 'Z7JWc80Qr4sa9z1y',
            'keySecret' => 'wYNthiODxexruCFaz9jDQ8Yfr8MujJ',
            'bucket' => 'bumeng-default',
            'savePath' => 'bumengpc'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    'params' => array(
        'cdnUrl' => 'http://ali-img.yooshow.com',
        'cdnSSLUrl' => 'http://bumeng-default.oss-cn-hangzhou.aliyuncs.com',
        'cookieDomain' => '',
        'admin' => md5('live_admin_A2423@#$234234sdfsfS(*&~'),
    ),


);