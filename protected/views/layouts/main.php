<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <?php  $controller = strtolower(Yii::app()->controller->id); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
    <title><?php echo '捕捉梦想捕捉爱!-捕梦网-YOOSHOW.COM';if($controller == 'project'){echo $this->pageTitle;}?></title>
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/active.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/form.js",CClientScript::POS_END);
    ?>
</head>
<body>
<div class="topbar">
    <div class="top">
        <div class="logo left"><a href="/"><img src="/images/logo.png" /></a><span>最大的明星粉丝互动娱乐平台</span></div>
        <div class="search left">
            <input type="text" value="<?php echo $_GET['keyword']?>" id="topSearch" onkeydown="keydownEvent()" placeholder="关键字" autocomplete="off" />
            <button onclick="search()"></button>
        </div>
        <div class="login left">
        <?php
        	if(Yii::app()->user->isGuest){
        ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="javascript:;" id="loginyh" class="c-gap-left">【登录】</a><a href="javascript:;" id="regyh" >【注册】</a>
  
        <?php
        	}else{
        ?>
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        <span style="color: #5D5D5D"> 欢迎 , </span>
	        <a href="<?php echo $this->createUrl('/myAccount')?>"><?php echo Yii::app()->user->name;?></a>
	        | <a href="<?php echo $this->createUrl('/site/logout')?>">退出</a>
   		<?php } ?>
        </div>
        <div class="enter right" style="margin-right: 40px;">
            <a href="/pay/vip.shtml" class="c-gap-right">开通vip</a>
<!--            <a href="javascript:;">客户端</a>-->
        </div>
    </div>

    <?php
    if(Yii::app()->user->isGuest){
    ?>
	<!--login begin-->
	
    <div id="LoginBox"> 
	<form id='custom_option' action='/api/login' method='POST'>
      <div class="login_fc">
        <div class="login_fc_tit">登录捕梦网</div>
        <div class="login_fc_clo"><a href="javascript:;" title="关闭窗口" id="closeBtn"><img src="/css/img/mxcenterbtn01.png" width="26" height="26" /></a></div>
        <div class="vspace"></div>
        <div class="login_fc_item">用户名称
          <input id="dphone" name="username" type="text" class="login_fc_input" />
        </div>
        <div class="login_fc_item">用户密码
          <input id="dpassword" name="password" type="password" class="login_fc_input" />
        </div>
         <div class="login_fc_item"><input id="dcheckbox" name="rememberMe"  type="checkbox" value="" /> 保持登录状态 </div>
         
        <div class="login_fc_item" >
			<span id="derroe"></span>
			<a id="dpost"><img src="/css/img/login_01.jpg" width="260" height="40" style="margin-top:5px; cursor: pointer;" /></a>
		</div>
        <div class="login_fc_item">
        	<ul>
            <li><a href="javascript:;">忘记密码</a></li>
            <li><a href="javascript:;" onclick="regTrigger()">注册用户</a></li>
            </ul>
        </div>
        <div class=" vspace" style="height:0px;"></div>
        <div class="login_fc_btm">
            <span>使用合作网站登录</span>
            <ul>
            <li><a href="javascript:;"><img src="/css/img/login_02.jpg" width="51" height="52" /></a></li>
            <li><a href="javascript:;"><img src="/css/img/login_03.jpg" width="51" height="52" /></a></li>
            <li><a href="javascript:;"><img src="/css/img/login_04.jpg" width="51" height="52" /></a></li>
            </ul>
        
        </div>
        
      </div>
	  </form>
        
    </div>

    <div id="RegBox">
	<form id='rcustom_option' action='/api/register' method='POST'>
      <div class="reg_fc">
        <div class="reg_fc_tit">注册新用户</div>
        <div class="reg_fc_clo"><a href="javascript:;" title="关闭窗口" id="closeReg"><img src="/css/img/mxcenterbtn01.png" width="26" height="26" /></a></div>
        <div class="vspace"></div>
        <div class="reg_fc_item">手机号/用户名称
          <input id="rphone" name="mobile" type="text" class="login_fc_input" />
        </div>
        <div class="reg_fc_item"><div style="width:200px;">手机验证码</div>
          <input id="mobile_code" name="mobile_code" type="text" class="login_fc_input" value="" style="width:130px;" /><input type="button" onclick="get_mobile_code();" value=" 获取手机验证码 " id="zphone">
        </div>
          <div class="reg_fc_item">登录密码
          <input name="password" id="rpassword" type="password" value="" class="login_fc_input" />
        </div>
          <div class="reg_fc_item">确认密码
          <input id="rpassword_repeat" name="password_repeat" value="" type="password" class="login_fc_input" />
        </div>
         
        <div class="login_fc_item"><input id='ty' name="checkbox" type="checkbox" value="" checked="checked" style=" vertical-align:middle;"/>我同意接受捕梦网用户协议</div>
			
        <div class="reg_fc_item"><b id="rerror"></b><a id="rpost"><img src="/css/img/reg_01.jpg" width="260" height="40" style="margin-top:5px;" /></a>
        </div>
        
        <div class="reg_fc_btm"><a href="javascript:;" onclick="loginTrigger()">使用已有账号登录</a></div>
        
      </div>
      </form>
    </div>
    <?php
    }
	?>
    
<!--reg end-->
</div>
<!--banner begin-->
<?php
$uri = strtolower(Yii::app()->request->getPathInfo());
if(empty($uri)){

	$this->widget('application.widgets.BannerWidget', array('group'=> 'Index Page Top1920x570','slider_type'=>'home'));
}
  ?>
<!--banner end-->
<div class="topnav">
    <div class="mainnav wrapper">
        <div class="nav_l left">
            <a <?php if($controller == 'site'){echo 'class="s"';}?> href="/">首页</a>
            <a <?php if($controller == 'bigshots'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/bigShots')?>">大枷秀</a>
            <a <?php if($controller == 'star'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/star')?>">明星档</a>
            <a <?php if($controller == 'project'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/project')?>">星愿城</a>
            <a <?php if($controller == 'shopping'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/shopping')?>">大牌店</a>
<!--            <a --><?php //if($controller == 'shopping'){echo 'class="s"';}?><!-- href="--><?php //echo Yii::app()->createUrl('/shopping')?><!--">粉社会</a>-->
        </div>
        <div class="nav_r left"><i></i>
            <a href="/">排行榜</a><span>|</span>
            <a <?php if($controller == 'company'){echo 'style="color:#ffe400;"';}?>href="<?php echo Yii::app()->createUrl('/company')?>">娱乐厂牌</a><span>|</span>
            <a href="/">微入口</a></div>
        <?php
			//if(!isset(Yii::app()->session['face'])) Yii::app()->session['face']= '/images/default.png';
        if(!Yii::app()->user->isGuest){
            $model = new Customer();
            $customer = $model->findByPk(Yii::app()->user->id);
		?>
		<div class="user">

            <a href="<?php echo Yii::app()->createUrl('/myAccount')?>"><img class="head left" src="<?php echo staticUrl($customer->face,array('mode' => 2, 'width' => '120','height' => '120'));?>"/></a>
            <div class="jiangpai left"><img  src="/css/img/jiangpai1.png"/></div>
            <h2 class="left"><?php echo Yii::app()->user->name?><!--<span>金牌会员</span>--></h2>
            <span class="down" style="display:none"></span>
            <div class="userinfo">

                <div class="t">
                    <div class="imgbox">
                        <div class="img left"><a href="<?php echo Yii::app()->createUrl('/myAccount')?>"><img  src="<?php echo staticUrl($customer->face,array('mode' => 2, 'width' => '104','height' => '104'));?>"  /></a></div>
                        <h3><a href="javascript:;"><?php echo Yii::app()->user->name?><!--<span>金牌会员</span>--></a></h3>
                        <a href="<?php echo $this->createUrl('/site/logout')?>" class="logout right">『退出』</a>
                        <p><img src="/css/img/jiangpai1.png"></p>
                        <div class="numbers"><span class=" playicon">金币：<i>0</i></span><span class=" comment">积分：<i>0</i></span><a href="javascript:;">去兑换</a></div>
                    </div>
                    <div class="bg"></div>
                </div>
                <div class="b">
                    <div class="mycenter">
                        <a href="javascript:;" id="gift"><img  src="/css/img/mygift.png"/></a>
                        <a href="/myAccount/myFavorites" id="collection" class="end"><img  src="/css/img/myccollection.png"/></a>
                        <a href="javascript:;" id="task"><img  src="/css/img/mytask.png"/></a>
                        <a href="javascript:;" id="visiter" class="end"><img  src="/css/img/myvisiter.png"/></a>
                    </div>
                    <div class="vip"><a target="_blank" href="/pay/vip.shtml">开通超级会员</a></div>
                    <div class="bg"></div>
                </div>
            </div>

        </div>
		<?php } ?>

    </div>
    <script type="text/javascript">
        var starttimer ="";
        $(".mainnav .head,.userinfo").on("mouseover",function(){
            clearTimeout(starttimer);
            starttimer = setTimeout(function(){
                $(".mainnav .down").show();
                $(".mainnav .userinfo").show();
            },200);
        });
        $(".mainnav .head,.userinfo").on("mouseleave",function(){
            clearTimeout(starttimer);
            starttimer = setTimeout(function(){
                $(".mainnav .down").hide();
                $(".mainnav .userinfo").hide();
            },200)
        });
    </script>
</div>
<!--content-->
<div>
    <?php echo $content; ?>
</div>

<!--footer-->
<div class="footer">
    <div class="foot">
        <div class="foot_logo clearfix"><span class="left"><img src="/css/img/logo_bottom.png" /></span><span class="left foot_logo_intro">最大的明星粉丝互动娱乐平台</span></div>
        <div class="foot_about"><a href="javascript:;">关于捕梦</a><a href="javascript:;">中国最大的明星粉丝互动视频平台</a><a href="javascript:;">联系我们</a><a href="javascript:;">常见问题</a></div>
    </div>
</div>
</body>
</html>