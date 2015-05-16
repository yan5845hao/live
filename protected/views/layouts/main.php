<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
    <title>title</title>
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/active.js");
    ?>
</head>
<body>
<?php  $controller = strtolower(Yii::app()->controller->id); ?>
<div class="topbar">
    <div class="top">
        <div class="logo left"><a href="/"><img src="/images/logo.png" /></a><span>最大的明星粉丝互动娱乐平台</span></div>
        <div class="search left">
            <input type="text" value="刘德华" />
            <button></button>
        </div>
        <div class="login left">
        <?php
        if(Yii::app()->user->isGuest){
        ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo $this->createUrl('/site/login')?>" class="c-gap-left">【登录】</a>
            <a href="<?php echo $this->createUrl('/account/register')?>">【注册】</a>
        <?php
        }else{
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="color: #5D5D5D"> 欢迎 , </span>
        <a href="<?php echo $this->createUrl('/myaccount')?>"><?php echo Yii::app()->user->name;?></a>
        | <a href="<?php echo $this->createUrl('/site/logout')?>">退出</a>
    <?php } ?>
        </div>
        <div class="enter right"><a href="" target="_blank" class="c-gap-right">开通vip</a><a href="" target="_blank">客户端</a></div>
    </div>
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
            <a <?php if($controller == ''){echo 'class="s"';}?> href="/">首页</a>
            <a <?php if($controller == 'bigshots'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/bigshots')?>">大枷秀</a>
            <a <?php if($controller == 'star'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/star')?>">明星档</a>
            <a href="#">星愿城</a>
            <a href="#">大牌店</a>
            <a href="#">粉社会</a>
        </div>
        <div class="nav_r left"><i></i><a href="#">排行榜</a><span>|</span><a href="#">娱乐厂牌</a><span>|</span><a href="#">微入口</a></div>
        <div class="user">
            <img class="head left" src="/images/dkxlistpic04.jpg"/>
            <div class="jiangpai left"><img  src="/css/img/jiangpai1.png"/></div>
            <h2 class="left">海.阳光<span>金牌会员</span></h2>
            <span class="down" style="display:none"></span>
            <div class="userinfo">
                <div class="t">
                    <div class="imgbox">
                        <div class="img left"><a href="#" target="_blank"><img  src="/images/dkxlistpic04.jpg"  /></a></div>
                        <h3><a href="#">海。阳光<i>金牌会员</i></a></h3>
                        <a href="javascript:void(0);" class="logout right">『退出』</a>
                        <p><img  src="/css/img/jiangpai1.png"/></p>
                        <div class="numbers"><span class=" playicon">金币：<i>15156</i></span><span class=" comment">积分：<i>15156</i></span><a href="#" target="_blank">去兑换</a></div>
                    </div>

                    <div class="bg"></div>

                </div>
                <div class="b">
                    <div class="mycenter">
                        <a href="#" id="gift"><img  src="/css/img/mygift.png"/></a><a href="#" id="collection" class="end"><img  src="/css/img/myccollection.png"/></a><a href="#" id="task"><img  src="/css/img/mytask.png"/></a><a href="#" id="visiter" class="end"><img  src="/css/img/myvisiter.png"/></a>
                    </div>
                    <div class="vip"><a href="#" target="_blank">开通超级会员</a></div>
                    <div class="bg"></div>
                </div>
            </div>

        </div>

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
        <div class="foot_about"><a href="" target="_blank">关于捕梦</a><a href="" target="_blank">中国最大的明星粉丝互动视频平台</a><a href="" target="_blank">联系我们</a><a href="" target="_blank">常见问题</a></div>
    </div>
</div>
</body>
</html>