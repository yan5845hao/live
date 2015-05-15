<?php

/**
 * Class AccountController
 * @author Demi 992392919@qq.com
 */
class ApiController extends BaseController
{
	public  function actionSchedule(){

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
}

?>