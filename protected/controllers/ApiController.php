<?php

/**
 * Class AccountController
 * @author Demi 992392919@qq.com
 */
class ApiController extends BaseController
{
	public  function actionSchedule(){//明星档调用

		$begintime = Yii::app()->getRequest()->getParam("startime");
		$begintime = explode("星期",$begintime);
		$showdate= $begintime[0];
		$showweek= '星期'.$begintime[1];

		$begintime = str_replace('年','-',$begintime['0']);
		$begintime = str_replace('月','-',$begintime);
		$begintime = str_replace('日','',$begintime);
		$begintime = str_replace(' ','',$begintime);
		$begintime = strtotime($begintime);
		$cachekey = md5($begintime.'homeshowSchedule');
	
		$data = StarSchedule::model()->getSchedule($begintime);
		
	
		
		$str = "<p>{$showdate}<span>{$showweek}</span></p>";
		$str.= '<div class="date">'.date('d',$begintime).'</div><ul>';
		

		if(!empty($data)){

			foreach($data as $v){
				$str.= 	'<li><div class="headbox left">';
				$str.= 	'<a href="star/detail?id='.$v['starid'].'" target="_blank"><img  src="'.$v['img'].'"/></a>';
				$str.=  '<div class="bg"></div>';
				$str.=  '</div>';
				$str.=  '<div class="des left">';
				$str.=  '<h5>'.$v['title'].'</h5>';
				 $str.= '<div><span class="time">'.date('H:i',$v['begintime']).'</span><span class="address">'.$v['address'].'</span></div></div></li>';
			}

		}
		$str.= '</ul>';
		echo $str;	  
	}

	public function actionLogin(){//登录

		$model=new LoginForm;
		if(isset($_POST))
		{
			$model->attributes=$_POST;
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
				echo '1';		
			}else{
				echo '2';
			}
		}
	}


	public function actionRegister(){//注册

		$sms = new Sms;
        $_SESSION['send_code'] = $sms->random(6, 1);
        $form = new RegisterForm();
        if ($_POST) {
            $form->phone = Yii::app()->getRequest()->getParam('mobile');
            $customer_data = array(
                'phone' => Yii::app()->getRequest()->getParam('mobile'),
                'password' => Yii::app()->getRequest()->getParam('password'),
            );
            $form->setAttributes($customer_data);
            if ($_POST['mobile'] != $_SESSION['mobile'] or $_POST['mobile_code'] != $_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])) {
                echo '3';
            } else if ($form->validate()) {
                $customer = new Customer();
                if($customer->registerLive($customer_data)){
                    $identify = new CustomerIdentity();
                    $identify->assignCustomer($customer);
                    Yii::app()->user->login($identify);

                    $cookie = new CHttpCookie('subtime',time());
                    $cookie->expire = time()+60*60*24*30;  //有限期30天
                    Yii::app()->request->cookies['subtime']=$cookie;
                    Yii::app()->session['subtime'] = '你今天刚注册成为本站会员';
                    $_SESSION['mobile'] = '';
                    $_SESSION['mobile_code'] = '';
                    echo '1';
                }else{
                    echo '2';
                }

            }
        }
	}


	public function actionAttention(){ //加关注
		

			if(!isset(Yii::app()->user->id)) {
				echo '3';//未登录
			}else{
				$strid = intval(Yii::app()->getRequest()->getParam('id'));
				
				if(CustomerAttention::model()->addattention(Yii::app()->user->id,$strid)==true){ 
					echo '1';
				}else{ 
					echo '2';
				}
			}
		

	}
}

?>