
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="login_fc">
    <div class="login_fc_tit">登录捕梦网</div>
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableAjaxValidation'=>true,
    )); ?>
        <div class="vspace"></div>
        <div class="login_fc_item">
            <?php echo $form->labelEx($model,'用户名'); ?>
            <?php echo $form->textField($model,'username',array('class'=>'login_fc_input')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>

        <div class="login_fc_item">
            <?php echo $form->labelEx($model,'密码'); ?>
            <?php echo $form->passwordField($model,'password',array('class'=>'login_fc_input')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>

        <div class="login_fc_item rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?> 保持登录状态
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
        <div class="login_fc_item">
            <ul>
                <li><a href="javascript:;">忘记密码</a></li>
                <li><a onclick="regTrigger()" href="javascript:;">注册用户</a></li>
            </ul>
        </div>
        <div style="height:0px;" class=" vspace"></div>
        <div class="reg_fc_item"><b id="rerror"></b><a onclick="$('form').submit();"><img src="/css/img/reg_01.jpg" width="260" height="40" style="margin-top:5px;" /></a></div>
    <?php $this->endWidget(); ?>
    </div>
</div>
