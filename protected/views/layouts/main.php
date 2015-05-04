<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
    <title>title</title>
    <?php
    //Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/common.css');
    ?>
</head>
<body>
<?php $uri = strtolower(Yii::app()->request->getPathInfo());?>
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
        <a href="<?php echo $this->createUrl('/site/login')?>" target="_blank" class="c-gap-left">【登录】</a>
        <a href="<?php echo $this->createUrl('/account/register')?>">【注册】</a>
    <?php
    }else{
    ?>
    欢迎,
    <?php echo Yii::app()->user->name;?>
    | <a href="<?php echo $this->createUrl('/site/logout')?>">退出</a>
<?php } ?>
    <a href="<?php echo $this->createUrl('/myaccount')?>">个人中心</a>
    </div>
    <div class="enter right"><a href="" target="_blank" class="c-gap-right">开通vip</a><a href="" target="_blank">客户端</a></div>
</div>
<div class="banner">
    <div class="huandeng-outer">
        <div class="huandeng-inner">
            <div><img src="/images/mxindex/banner.png"/></div>
            <div><img src="/images/mxindex/banner.png"/></div>
            <div><img src="/images/mxindex/banner.png"/></div>
        </div>
        <ul class="huangdeng-btn">
            <li class="current"><a href="javascript:;"></a></li>
            <li><a href="javascript:;" ></a></li>
            <li><a href="javascript:;" ></a></li>
        </ul>
    </div>
</div>
<div class="nav">
    <div class="nav_inner">
        <ul>
            <li <?php if($uri == ''){echo 'class="current"';}?>><a href="/">首页</a></li>
            <li <?php if($uri == 'bigshots'){echo 'class="current"';}?>><a href="<?php echo Yii::app()->createUrl('/bigshots')?>">大枷秀</a></li>
            <li><a href="#">明星档</a></li>
            <li><a href="#">星愿城</a></li>
            <li><a href="#">大牌店</a></li>
            <li><a href="#">粉社会</a></li>
        </ul>
    </div>
</div>

<!--content-->
<div class="content_wrapper" style="min-height: 500px;">
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>

<!--footer-->
<div class="foot">
    <div class="foot_logo clearfix"><span class="left"><img src="/images/logo_small.png" /></span><span class="left foot_logo_intro">最大的明星粉丝互动娱乐平台</span></div>
    <div class="foot_about"><a href="" target="_blank">关于捕梦</a><a href="" target="_blank">关于捕梦</a><a href="" target="_blank">关于捕梦</a><a href="" target="_blank">关于捕梦</a></div>
</div>
<script text="text/javascript">
    $(document).ready(function() {

        function init(){
            var oInner=$(".huandeng-inner"),
                oImgs=$(".huandeng-inner  img"),
                oCopy;
            if(oImgs.eq(0).parent()[0].tagName == 'A'){
                oCopy=oInner.find('a:first').clone(true);
            }else{
                oCopy=oInner.find('img:first').clone(true);
            }
            oInner.append(oCopy);
            oInner.css("width",$(".huandeng-inner img").length * 1244);
        }
        init();
        var c = 0;
        function autoMove (){
            c++;
            if(c == $(".huandeng-inner img").length){
                c = 1;
                $('.huandeng-inner').css({'left':0});
            }
            // 计算ul的top值
            var left = c*-1244;
            // 运动到指定位置
            $('.huandeng-inner').stop().animate({'left':left}, 600);
            if(c == ($(".huandeng-inner img").length - 1)){
                $('.huangdeng-btn').find('li').eq(0).addClass('current').siblings('li').removeClass('current');
            }
            $('.huangdeng-btn').find('li').eq(c).addClass('current').siblings('li').removeClass('current');
        }

        var timer = setInterval(autoMove,3000);


        $('.huandeng-outer ul.huangdeng-btn>li').click(function(){
            var $banner=$(this).parent().parent('.huandeng-outer');
            clearInterval(timer);
            // 获得被点击的li 的序号
            var spanIndex=$(this).index();
            $(this).siblings('li').removeClass('current');
            $(this).addClass('current');
            $banner.find('div.huandeng-inner').stop().animate({'left':-1080*spanIndex}, 600);
            c = spanIndex;
        });



        $('.huandeng-inner').hover(function() {
            clearInterval(timer);
        }, function() {
            timer = setInterval(autoMove,3000);
        });

    });
</script>
</body>
</html>