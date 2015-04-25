<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>捕捉梦想捕捉爱!-捕梦网</title>
</head>

<body>

<div style="width: 1920px; height: 20px; border: 1px solid #ccc; margin-bottom: 5px;">
    <?php
    if(Yii::app()->user->isGuest){
        ?>
        <a href="<?php echo $this->createUrl('site/login')?>">登陆</a> | 注册
    <?php
    }else{
        ?>
        欢迎,
        <?php echo Yii::app()->user->name;?>
        |<a href="<?php echo $this->createUrl('site/logout')?>">退出</a>
    <?php } ?>
</div>
<?php echo $content; ?>
</body>
</html>