<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>title</title>
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/base.css');
    ?>
</head>

<body>

<div style="width: 1200px; line-height: 30px; border: 1px solid #ccc; margin-bottom: 5px; margin: 0px auto;">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    if(Yii::app()->user->isGuest){
        ?>
        <a href="<?php echo $this->createUrl('site/login')?>">登陆</a> | <a href="<?php echo $this->createUrl('account/register')?>">注册</a>
    <?php
    }else{
        ?>
        欢迎,
        <?php echo Yii::app()->user->name;?>
        | <a href="<?php echo $this->createUrl('site/logout')?>">退出</a>
    <?php } ?>
    &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->createUrl('MyAccount/index')?>">个人中心</a>
</div>
<div class="wrap" style="height: 110px;">
    <div class="header">
        <h1 class="logo">
            <a href="<?php echo $this->createUrl('site/index')?>">
                <img alt="logo" src="#" width="161" height="56" class="pngFix">
            </a>
        </h1>

        <div class="nav-search">
            <div class="search-box">
                <form action="#" method="GET" name="topsearch">
                    <input type="text" autocomplete="off" placeholder="请输入" value="" name="w" id="site-search-txt" class="name">
                    <input type="hidden" name="from" value="site/index">
                    <input type="submit" value="" id="site-search-btn" class="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="wrap clear">
<?php echo $content; ?>
</div>

<!--footer-->
<div class="footer wrap" style="border: 1px solid #ccc; margin-top: 10px;">
    <div class="txtbox">
        <dl>
            <dt>帮助中心</dt>
            <ul>
                <li><a href="http://www.yooshow.com/help/item?id=29b53718-39b8-4984-927d-2c24fffec171&amp;type=501" target="_blank">用户购物流程</a></li>
                <li><a href="http://www.yooshow.com/help/item?id=0b229aca-fc5b-48f3-a9b5-07e68eb148ef&amp;type=501" target="_blank">常见问题</a></li>
                <li><a href="http://www.yooshow.com/help/item?id=ee35f2ee-d3a3-4c06-9a89-b1358deb1af0&amp;type=501" target="_blank">联系我们</a></li>
            </ul>
        </dl>
        <dl>
            <dt>支付方式</dt>
            <ul>
                <li><a href="http://www.yooshow.com/help/item?id=b76c7fcd-cff6-4503-a976-df88ce0ddace&amp;type=502" target="_blank">支付宝</a></li>
                <li><a href="http://www.yooshow.com/help/item?id=c3a61354-4b71-4f2e-bdda-607907b2a232&amp;type=502" target="_blank">交易条款</a></li>
            </ul>
        </dl>
        <dl>
            <dt>积分中心</dt>
            <ul>
                <li><a href="http://www.yooshow.com/help/item?id=a5a8869f-6bf2-420a-8fcf-846d3e91ab47&amp;type=503" target="_blank">什么是积分</a></li>
            </ul>
        </dl>
        <dl>
            <dt>商家入驻</dt>
            <ul>
                <li><a href="http://www.yooshow.com/help/item?id=c3a61354-4b71-4f2e-bdda-607907b2a232&amp;type=504" target="_blank">交易条款</a></li>
            </ul>
        </dl>
    </div>
</div>
</body>
</html>