<?php
class DemoController extends BaseController
{
	public function actionIndex(){ 
		$s = new SphinxClient();
		$s->setServer("localhost", 9312);
		$s->SetConnectTimeout ( 1 );//设置链接超时
		//$s->setMatchMode(SPH_MATCH_ANY);//匹配模式
		$s->setMaxQueryTime(3);//查询超时

		$s->SetArrayResult ( true );//结果是否有ID
		$s->SetLimits ( 0, 10 );//显示数量:开始 量 最大量 右偏移量
		$result = $s->query("音乐","*");//查询


		print_r($result);


	}


}