<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
    <title>title</title>
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
    ?>
</head>
<body>
<?php $uri = strtolower(Yii::app()->request->getPathInfo());?>
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
<div class="topnav">
    <div class="mainnav wrapper">
        <div class="nav_l left">
            <a <?php if($uri == ''){echo 'class="s"';}?> href="/">首页</a>
            <a <?php if($uri == 'bigshots'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/bigshots')?>">大枷秀</a>
            <a <?php if($uri == 'star'){echo 'class="s"';}?> href="<?php echo Yii::app()->createUrl('/star')?>">明星档</a>
            <a href="#">星愿城</a>
            <a href="#">大牌店</a>
            <a href="#">粉社会</a>
        </div>
        <div class="nav_r left"><i></i><a href="#">排行榜</a><span>|</span><a href="#">娱乐厂牌</a><span>|</span><a href="#">微入口</a></div>
        <div class="user"></div>
    </div>
</div>
<!--content-->
<div class="wrapper" style="min-height: 500px;">
    <div class="content">
        <?php echo $content; ?>
    </div>
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