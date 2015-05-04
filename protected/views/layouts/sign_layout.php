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
<div class="top">
    <div class="logo left"><a href="/"><img src="/images/logo.png" /></a><span>最大的明星粉丝互动娱乐平台</span></div>
    <div class="search left">
        <input type="text" value="刘德华" />
        <button></button>
    </div>
</div>
<!--content-->
<div class="content_wrapper" style="min-height: 800px;">
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>
</body>
</html>